@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <a href="{{ route('posts.show', $post->id) }}">
                    <img class="card-img-top" src="/storage/images/{{$post->image}}" alt="..." />
                </a>

                <div class="card-body">

                        <small>Posted by <a href="{{ route('users/profile', $post->user->name) }}">{{ $post->user->name }}</a> the {{ $post->created_at->format('d/m/Y \a\t H:i') }}</small><br>
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
                        <br><br>
                        <hr>
                        <br><br>

                        <h4>Display Comments</h4>

                        @foreach($comments as $comment)
                            <div>
                                <p>{{ $comment->content }}</p>
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
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                        @endauth

                        @auth
                          @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="Delete Post" onclick="return confirm('Are you sure you want to delete this post?');">
                            </form>
                          @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
