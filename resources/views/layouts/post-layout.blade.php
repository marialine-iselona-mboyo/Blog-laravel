<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>NoName</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>
</head>
<body>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
              <strong>NoName</strong>
            </a>
            <a class="navbar-brand d-flex align-items-center" href="{{ route('posts/index') }}">{{ __('Posts') }}</a>

            <a class="navbar-brand d-flex align-items-center" href="{{ route('faq/index') }}">{{ __('FAQ Page') }}</a>

            <a class="navbar-brand d-flex align-items-center" href="{{ route('partials/contact') }}">{{ __('Contact') }}</a>

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

                    <a class="dropdown-item" href="{{ route('partials/about') }}">{{ __('About') }}</a>
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

    <footer class="text-body-secondary py-5 bg-dark">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
          <p class="mb-1 text-white">Copyright &copy; Bootstrap, Album example</p>
          <p class="mb-0 text-white">NoName - Made by Marialine Iselona Mboyo</p>
        </div>
    </footer>
    <script src="{{ asset ('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
