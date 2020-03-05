<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/hamburger.css">
    <style>
        body {
            background-color: #e3e3e3;
        }

        .navbar a {
            color: white;
        }

        .bg-perso {
            background-color: hsl(187, 97%, 29%);
        }

        .dropdown-menu {
            background-color: #5eb1b3b8;
            padding: 0.2vw 0;
            margin: 0;
            border: none;
        }

        .dropdown-item:hover {
            background-color: #91ccceb8 !important;
        }

        .taille-hamb {
            width: 30%;
        }

        @media screen and (max-width: 767px) {
            .taille-hamb {
                width: 50%;
            }
        }


        @media screen and (max-width: 991px) {
            .taille-hamb {
                width: 40%;
            }
        }


        @media screen and (max-width: 1199px) {
            .taille-hamb {
                width: 35%;
            }
        }

    </style>

    @yield('scripts-header')
</head>

<body>
    <div id="app">
        <div class="container-fluid bg-perso">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-perso">

                    <button class="navbar-toggler second-button" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
                    </button>

                    <a href="{{ route('pindex') }}" class="mr-10p taille-hamb"><img src="../../../img/logo-color2.png" alt="Logo Color-Drop" class="img-fluid"></a>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto">
                            <li class="mr-5"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="mr-5"><a href="{{ route('players.index') }}">Players</a></li>
                            <li class="mr-5"><a href="{{ route('levels.index') }}">Levels</a></li>
                            <li class="mr-5"><a href="{{ route('games.index1') }}">Games</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="action-button shadow animate blue"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="action-button shadow animate green"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

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
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        @if(session()->has('type') && session()->has('message'))
        <div class="alert alert-{{ session('type')}} alert-dismissible fade show w-50 mx-auto my-4" role="alert">
            {{ session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="mt-1">
            <a href="javascript:history.go(-1)"><i class="fas fa-angle-double-left mr-2"></i>Précédent</a>
            {{-- <a type="button" class="btn btn-secondary" href="{{ back() }}">Retour à la page précédente</a> --}}
        </div>

        @yield('content')

    </div>

    <script type="text/javascript" src="js/hamburger.js"></script>
    @yield('scripts-footer')
</body>

</html>
