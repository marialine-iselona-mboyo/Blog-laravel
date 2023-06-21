<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset ('assets/favicon.ico') }}" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset ('css/styles.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset ('js/scripts.js') }}"></script>

</head>
<body >
    <div id="app">
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


        <main class="py-4" style="margin:15px">
            @yield('content')
        </main>
    </div>
</body>
</html>
