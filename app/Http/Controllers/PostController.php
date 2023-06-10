<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct(){
      $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    public function index(){
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('posts.index', compact('posts'));
    }

    public function show($id){
      $post = Post::findOrFail($id);
      $comments = $post->comments;
      return view('posts.show', compact('post', 'comments'));
    }

    public function create(){
      if(!Auth::user()->is_admin){
          abort(403, 'Only admins can create posts');
      }

      return view('posts.create');
    }

    public function store(Request $request){

      $validated = $request->validate([
        'title'       => 'required|min:3',
        'content'     => 'required|min:20',
        'image'       => 'required|image',
      ]);

      // If error
      $post = new Post;
      $post->title = $validated['title'];
      $post->message = $validated['content'];
      $post->user_id = Auth::user()->id;
      $post->save();

      // Adding image to post
      $image = $request->file('image');
      $imageName = $post->id .'.'. $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);

      $post->image = $imageName;
      $post->save();

      return redirect()->route('posts/index')->with('status', 'Post added');

    }

    public function edit($id){
      $post = Post::findOrFail($id);

      if($post->user_id != Auth::user()->id){
        abort(403);
      }

      return view('posts.edit', compact('post'));
    }



    public function update($id, Request $request){
      $post = Post::findOrFail($id);

      if($post->user_id != Auth::user()->id){
        abort(403);
      }

      $validated = $request->validate([
        'title'       => 'required|min:3',
        'content'     => 'required|min:20',
        'image'        => 'image|max:2048',
        'update_at'   => now(),
      ]);

      $post->title = $validated['title'];
      $post->message = $validated['content'];

      $image = $request->file('image');
      $imageName = $post->id .'.'. $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);

      $post->image = $imageName;


      $post->save();

      return redirect()->route('posts/index')->with('status', 'Post edited');

    }

    public function destroy($id){
      if(!Auth::user()->is_admin){
        abort(403, 'Only admins can delete posts');
      }

      $post = Post::findOrFail($id);
      $likes = Like::where('post_id', '=', $post->id)->delete();
      $post->delete();

      return redirect()->route('posts/index')->with('status', 'Post deleted');
    }
}
