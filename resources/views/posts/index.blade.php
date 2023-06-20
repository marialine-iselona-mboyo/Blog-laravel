@extends('layouts.post-layout')

@section('content')

<header class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Welcome Petit Scarabée!</h1>
            <p class="lead text-body-secondary">
                <i>“While I'm writing, I'm far away; <br>
                and when I come back, I've gone.”</i>
            </p>
            <p>
                ― Pablo Neruda
            </p>

        </div>
    </div>
</header>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div>
                    @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Posts</a>
                    @endif
                    @endauth

                    <br><br>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="card mb-2" style="width:800px">

                            <a href="{{ route('posts.show', $post->id) }}">
                                <img class="bd-placeholder-img card-img-top" src="{{asset('images/' . $post->image )}}"
                                style="width:550px; height:450px;margin-top: 10px;display: block;
                                margin-left: auto;margin-right: auto;"
                                alt="..." />
                            </a>
                            <div class="card-body">
                                <div class="card-text small text-muted">
                                    <small>
                                        Posted by <a href="{{ route('users/profile', $post->user->name) }}" style="text-decoration: none; color: black">
                                        {{ $post->user->username }}</a> the {{ $post->created_at->format('d/m/Y \a\t H:i') }}
                                    </small>
                                    <br>
                                </div>
                                <h4 class="card-title"><a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none; color: black">{{ $post->title }}</a></h4>
                                <p class="card-text">{{ $post->message }}</p>
                                <p>Genre: {{$post->genre->name}}</p>
                                The post has {{ $post->likes()->count() }} likes
                                <br><br>

                                @auth
                                    @if($post->user_id == Auth::user()->id)
                                        <button>
                                            <a href="{{ route('posts.edit', $post->id) }}" style="text-decoration: none; color: black; background-color:white;
                                            border-radius: 25%; border-color: gray">
                                            Edit Post
                                            </a>
                                        </button>
                                    @else
                                        <button>
                                            <a href="{{ route('like', $post->id) }}" style="text-decoration: none; color: black; background-color:white;
                                            border-radius: 25%; border-color: gray">
                                            Like Post
                                            </a>
                                        </button>
                                    @endif
                                    <br>
                                @endauth

                                <hr>
                                <br>

                                <h4>Display Comments</h4>

                                @foreach($post->comments as $comment)
                                    <div>
                                        <p>{{ $comment->content }}</p>
                                        <small>Commented by <a href="{{ route('users/profile', $comment->user->name) }}">
                                            {{ $comment->user->username }}</a> the {{ $comment->created_at->format('d/m/Y \a\t H:i') }}
                                        </small>
                                        <br><br>
                                    </div>

                                    @auth
                                        @if ($comment->user_id == Auth::user()->id)
                                            <button>
                                                <a href="{{ route('comments.edit', ['postId' => $post->id, 'commentId' => $comment->id]) }}" style="text-decoration: none; color: black; background-color:white;
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

                                @endforeach

                                <br><br>

                                @auth
                                    <h6>Add comment</h6>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
