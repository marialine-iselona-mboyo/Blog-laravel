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

    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return view('posts.index', compact('postId', 'comments'));
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

    public function edit($postId , $commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        return view('comments.edit', compact('comment', 'postId', 'commentId'));
    }

    public function update(Request $request, $postId , $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'content'     => 'required|min:20',
        ]);

        $comment->content = $validated['content'];

        $comment->save();

        return redirect()->route('posts.show', $postId)->with('status', 'Comment has been updated');
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id != Auth::user()->id) {
            abort(403, 'Unauthorized');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
