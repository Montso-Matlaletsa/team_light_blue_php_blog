<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Php Blog') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />


 <script src="{{asset('js/jquery.js')}}"></script>
   
    <!-- Scripts -->
    

</head>
<body>
    <div id="app">
        <nav class="green navbar-fixed">
            <div class="nav-wrapper">
              <a href="#!" class="brand-logo">Blog</a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="/">Posts</a></li>
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
            <li><a href="/home">+ Post</a></li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-button" href="#" role="button" data-activates="dropdown1" v-pre>
                    {{ Auth::user()->name }} 
                </a>

                <div id="dropdown1" class="dropdown-content" aria-labelledby="navbarDropdown">
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
          </nav>
        
          <ul class="sidenav" id="mobile-demo">
            <li><a href="/">Posts</a></li>

            @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                </li>
            @endif
        @else
            <li><a href="/home">Dashboard</a></li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-button" href="#" role="button" data-activates="dropdown1" v-pre>
                    {{ Auth::user()->name }} {{Auth::user()->last_name}}
                </a>

                <div class="dropdown-content" aria-labelledby="navbarDropdown">
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

        <main class="">
            @yield('content')
          
        </main>

    </div>
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
