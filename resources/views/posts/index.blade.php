@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                        <img src="/uploads/{{ $post->image }}" style="width: 500px;" /><br>
                        <small>Posted by <a href="{{ route('profile', $post->user->username) }}">{{ $post->user->username }}</a> on the {{ $post->created_at->format('d/m/Y \o\m H:i') }}</small><br>
                        @auth
                          @if($post->user_id == Auth::user()->id)
                            <button type="submit" class="btn btn-primary">
                                <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                            </button>
                          @else
                            <button type="submit" class="btn btn-primary">
                                <a href="{{ route('like', $post->id) }}">Like Post</a>
                            </button>
                          @endif
                          <br>
                        @endauth
                        The post have {{ $post->likes()->count() }} likes
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
