@extends('layouts.app')

@section('content')

<header class="py-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bolder">Welcome Petit Scarabée!</h1>
            <p class="lead mb-0">
                <i>“While I'm writing, I'm far away; <br>
                and when I come back, I've gone.”</i>
            </p>
            <p>
                ― Pablo Neruda
            </p>

        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-6">


            @auth
            @if(Auth::user()->is_admin)
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Posts</a>
            @endif
            @endauth

            <br><br>

            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img class="card-img-top" src="/storage/images/{{$post->image}}" alt="..." />
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">
                                <small>
                                    Posted by <a href="{{ route('users/profile', $post->user->name) }}" style="text-decoration: none; color: black">
                                    {{ $post->user->username }}</a> the {{ $post->created_at->format('d/m/Y \a\t H:i') }}
                                </small>
                                <br>
                            </div>
                            <h4 class="card-title"><a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none; color: black">{{ $post->title }}</a></h4>
                            <p class="card-text">{{ $post->message }}</p>
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
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>


</div>

<!-- Footer-->
<footer class="py-5 bg-dark">
<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>

@endsection
