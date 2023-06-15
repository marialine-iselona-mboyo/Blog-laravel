@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <a href="{{ route('posts.show', $post->id) }}">
                    <img class="card-img-top" src="{{asset('images/' . $post->image )}}" style="height:300px;margin-top: 10px;" alt="..." />
                </a>

                <div class="card-body">

                        <small>Posted by <a href="{{ route('users/profile', $post->user->username) }}">
                            {{ $post->user->username }}</a> the {{ $post->created_at->format('d/m/Y \a\t H:i') }}
                        </small><br>
                        <br>
                        {{ $post->message }}

                        <br><br>
                        @auth
                          @if($post->user_id == Auth::user()->id)
                            <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                          @else
                            <a href="{{ route('like', $post->id) }}">Like Post</a>
                          @endif
                          <br>
                        @endauth
                        Post has {{ $post->likes()->count() }} likes
                        <br>
                        <hr>
                        <br>

                        <h4>Display Comments</h4>

                        @foreach($comments as $comment)
                            <div>
                                <p>{{ $comment->content }}</p>
                                <small>Commented by <a href="{{ route('users/profile', $comment->user->username) }}">
                                    {{ $comment->user->username }}</a> the {{ $comment->created_at->format('d/m/Y \a\t H:i') }}
                                </small>
                                <br>
                                @auth
                                    @if ($comment->user_id == Auth::user()->id)
                                        <button>
                                            <a href="{{ route('comments.edit', ['postId' => $post->id, 'commentId' => $comment->id]) }}"
                                            style="text-decoration: none; color: black; background-color:white;
                                            border-radius: 25%; border-color: gray">
                                            Edit Comment
                                            </a>
                                        </button>
                                    @endif
                                        <br><br>

                                    @if ($comment->user_id == Auth::user()->id)
                                        <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment->id, 'postId' => $post->id]) }}">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Delete Comment</button>
                                        </form>
                                    @endif


                                @endauth

                                <br>
                            </div>
                        @endforeach

                        <br><br>
                        <hr />
                        @auth
                            <h4>Add comment</h4>
                            <br>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="content"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
