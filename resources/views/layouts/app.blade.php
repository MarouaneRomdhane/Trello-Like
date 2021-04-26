<style>
    .nav_styles {
        font-family: 'Big Shoulders Inline Text', cursive;
    }
</style>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="nav_styles">
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm sticky-top na">
                <div class="container">
                    <div class="police"> <a class="navbar-brand " href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <div class="container">
                                <a class="navbar-brand" href="{{ @route('home') }}">Accueil</a>
                            </div>
                            <div class="container">
                                <a class="navbar-brand" href="{{ @route('user.dashboard') }}">Mes Tableaux</a>
                            </div>
                            <div class="container">
                                <a class="navbar-brand" href="{{ route('user.profile') }}">{{ __('Profil') }}</a>
                            </div>
                            <li class="nav-item dropdown">
                                @if(Auth::user()->avatar == 1)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="width:50px" src="{{asset('/storage/assets/uploads/avatar1.png')}}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @endif
                                @if(Auth::user()->avatar != 1)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="width:50px"
                                        src="{{asset('/storage/assets/uploads/'.Auth::user()->avatar)}}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @endif
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
