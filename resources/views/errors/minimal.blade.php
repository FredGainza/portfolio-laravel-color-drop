<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Color-Drop - @yield('title')</title>

 <!-- Scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="css/parents.min.css">
 <style>
    html, body {
        background-color: #fff;
        color: #f7f8f8;
        font-family: 'Nunito', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .code {
        font-size: 1.8vw;
        padding: 10px 15px 10px 15px;
        text-align: center;
    }

    .message {
        font-size: 1.8vw;
        text-align: center;
    }

    .fz-150{margin-left: 0 !important;}
</style>
 @yield('scripts-header')
</head>
<!-- Styles -->


    <body>

        <nav class="navbar navbar-expand-md bg-opacite">

            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="{{ route('pindex') }}" class="mr-10p taille-hamb"><img src="../../../img/logo-color2.png" alt="Logo Color-Drop" class="img-fluid"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="fz-150">Message d'erreurs</li>
                        <li class="nav-link mx-5">
                            <a href="{{ route('pindex') }}">Accueil</a>
                        </li>
                        <li class="nav-link mr-5">
                            <a href="{{ route('help') }}">Aide</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="action-button shadow animate blue" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="action-button shadow animate green" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex-center mt-2">
            <div class="code color-msg">
                @yield('code')
            </div>

            <div class="message color-msg" style="padding: 10px;">
                @yield('message')
            </div>
        </div>
    </body>
</html>
