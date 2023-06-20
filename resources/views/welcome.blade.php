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
        <header data-bs-theme="dark">
            <nav class="navbar navbar-dark bg-dark shadow-sm">
              <div class="container">

                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                  <strong>NoName</strong>
                </a>
                <a class="navbar-brand d-flex align-items-center" href="{{ route('posts/index') }}">{{ __('Posts') }}</a>

                <a class="navbar-brand d-flex align-items-center" href="{{ route('faq/index') }}">{{ __('FAQ Page') }}</a>

                <a class="navbar-brand d-flex align-items-center" href="{{ route('partials/contact') }}">{{ __('Contact') }}</a>

                <a class="navbar-brand d-flex align-items-center" href="{{ route('partials/about') }}">{{ __('About') }}</a>

                <li class="nav-item dropdown navbar-brand d-flex align-items-center">
                    @auth
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>
                    @endauth

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @auth
                        <a class="dropdown-item" href="{{ route('users/profile', auth()->user()->name) }}">{{ __('Profile') }}</a>
                        @endauth

                        @auth
                            @if (Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{ route('categories/index_cat') }}">{{ __('Categories') }}</a>
                            <a class="dropdown-item" href="{{ route('genres/index-genre') }}">{{ __('Genres') }}</a>
                            <a class="dropdown-item" href="{{ route('admin/users') }}">{{ __('Users') }}</a>
                            @endif
                        @endauth
                    </div>
                </li>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">

                                <div class="navbar-toggler" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

              </div>
            </nav>
        </header>
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
                        <div class="col-lg-6">

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
                                    <p>Genre: {{$post->genre->name}}</p>
                                    <hr>
                                    The post has {{ $post->likes()->count() }} likes

                                    <hr>
                                    <h4>Display Comments</h4>
                                    @foreach($post->comments as $comment)
                                        <p class="card-text">{{ $comment->content }}</p>
                                        <small>Commented by <a href="{{ route('users/profile', $comment->user->name) }}">
                                            {{ $comment->user->username }}</a> the {{ $comment->created_at->format('d/m/Y \a\t H:i') }}
                                        </small>
                                        <br><br>
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
                                <form action="{{ route('partials/search', 'posts/search') }}" method="GET" role="search">
                                    @csrf
                                    <input class="form-control" name="search" value="" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                </form>
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
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p><span style="font-weight: bold;" class="mb-1 text-white">NoName</p>
                <p class="mb-1 text-white">Aa Street &#8725; 1070 Anderlecht &#8725;
                    <a href="tel:012345678" class="mb-1 text-white"> tel. 01 234 56 78</a>
                </p>
                <p class="mb-1 text-white">
                    <a href="mailto:admin@ehb.be" class="mb-1 text-white">admin@ehb.be</a> &#8725;
                    <a href="#" class="mb-1 text-white">WWW.NONAME.BE</a>
                </p>
                <p class="mb-1 text-white">Copyright &copy; NoName 2023</p>
                <p class="mb-0 text-white">Made by Marialine Iselona Mboyo</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('js/scripts.js') }}"></script>
    </body>
</html>

