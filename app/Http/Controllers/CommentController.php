<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
    $comments = Comment::all();
    return view('posts.index', compact('post_id','comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back();

    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id != Auth::user()->id) {
            abort(403);
        }

        return view('posts.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id != Auth::user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'content'     => 'required|min:20',
        ]);

        $comment->content = $validated['content'];

        $comment->save();

        return redirect()->route('posts.index')->with('status', 'Comment has been updated');
    }

    public function destroy($postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id != Auth::user()->id) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('posts.show', $postId)->with('status', 'Succesfully deleted');
    }
}
