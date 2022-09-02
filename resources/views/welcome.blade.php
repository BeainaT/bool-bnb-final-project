<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>4BnB</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa-solid fa-house"></i> 
                    <span>4BnB</span> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if (Auth::user()->avatar == Null)
                                        <img style="border-radius:50px; width:30px; height:30px; object-fit:cover; " src="{{asset('/img/user/default_user_image.jpg')}}" alt="">
                                    @else
                                        <img style="border-radius:50px; width:30px; height:30px; object-fit:cover; " src="{{asset('storage/'.Auth::user()->avatar)}}" alt="">                                        
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a>
                                    <a class="dropdown-item" href="{{route('user.houses.index')}}">Lista appartamenti</a>
                                    <a class="dropdown-item" href="{{route('user.houses.create')}}">Inserisci appartamenti</a>
                                    <hr>
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
    <main>
        @yield('content')
    </main>
    <footer class="py-1">
        <div class="container">
            <div class="row">
                <div class="rights col">
                    <p>2022 4BnB</p>
                    <p>Sito regolarmente registrato presso Boolean.</p>
                </div>
                <div class="social col-2">
                    <a href="http://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
                    <a href="http://www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
                    <a href="http://www.youtube.com"><i class="fa-brands fa-youtube"></i></a>
                    <a href="http://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>  
    </footer>
</body>
</html>
