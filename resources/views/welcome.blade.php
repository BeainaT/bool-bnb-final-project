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
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>4BnB</strong>
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
    @yield('content')
    <footer class="mt-3 py-3">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="box_image">
                            <a href="http://home"></a>
                            <img src="https://loghi-famosi.com/wp-content/uploads/2020/07/Airbnb-Logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h6>
                            Sito regolarmente registrato presso Boolean.
                            Tutti i diritti riservati.
                            La responsabilità legale è di chi ci crede.
                        </h6>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <ul>
                        <li><a href="http://www.facebook.com"></a><img src="https://icons-for-free.com/iconfiles/png/512/facebook+high+quality+media+social+social+media+square+icon-1320192615308993674.png" alt="FB"></li>
                        <li><a href="http://www.twitter.com"></a><img src="https://upload.wikimedia.org/wikipedia/it/0/09/Twitter_bird_logo.png?20160903181542" alt="TW"></li>
                        <li><a href="http://www.youtube.com"></a><img src="https://cdn.icon-icons.com/icons2/2699/PNG/512/youtube_logo_icon_168737.png" alt="YT"></li>
                        <li><a href="http://www.pinterest.com"></a><img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Pinterest-logo.png" alt="PT"></li>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>  
        <div class="footer_bottom py-3">
            <p>Fatto con passione da Tania, Emanuele, Ettore, Ivan e Marcello</p>
        </div>
    </footer>
</body>
</html>
