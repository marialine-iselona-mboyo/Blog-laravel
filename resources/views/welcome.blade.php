<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Blog</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset ('assets/favicon.ico') }}" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset ('css/styles.css') }}" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">NoName</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!--<li class="nav-item"><a class="nav-link" href="#">Home</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="{{ route('posts/index') }}">Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('faq/index') }}">FAQ Page</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('partials/contact') }}">Contact</a></li>
                    </ul>

                    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ route('users/profile', Auth::user()->name) }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="text-decoration: none; color: grey">Profile</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="text-decoration: none; color: grey">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="text-decoration: none; color: grey">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome Petit Scarabée!</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">

                        <!-- Blog post-->
                        @foreach ($posts as $post)
                        <div >

                            <div class="card mb-2">

                                <img class="card-img-top" src="{{asset('images/' . $post->image )}}" style="height:400px;margin-top: 10px;" alt="..." />
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
                                    <hr>
                                    The post has {{ $post->likes()->count() }} likes

                                    <hr>
                                    <h4>Display Comments</h4>
                                    @foreach($post->comments as $comment)
                                        <p class="card-text">{{ $comment->content }}</p>
                                        <small>Commented by <a href="{{ route('users/profile', $comment->user->username) }}">
                                            {{ $comment->user->username }}</a> the {{ $comment->created_at->format('d/m/Y \a\t H:i') }}
                                        </small>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">FAQ Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('js/scripts.js') }}"></script>
    </body>
</html>

