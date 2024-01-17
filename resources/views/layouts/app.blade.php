<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Apotek Aulia') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar fixed navbar-expand-md p-0 navbar-light bg-gray shadow-sm">
            <div class="container-fluid row navbar-header">
                <div class="col-md-2 navbar-header py-3">
             <img class="img-icon"  src="{{ asset('asset/icon-apotek.png') }}" alt="Example Image">
                <a class="ms-2 navbar-brand text-light text-big" href="{{ url('/') }}">
                Apotek Aulia
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    </div>  
                <div class="col-md-10 ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="scrolling-text container-fluid">
                        <marquee behavior="scroll" direction="left">
                            </marquee>
                        </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link ml-5 text-white fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link ms-3 text-white fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
<style>
.scrolling-text {
  background-color: transparent; 
  color: #000; 
  padding:10px 0;

}
.img-icon{
    width:20%;
}
.content{
    background: linear-gradient(to bottom, #EDF1F5 33%, #EDF1F5 10%);
    /* background-color:#EDF1F5; */
}
.nav-link{
    border-radius:10px;
}
.nav-link:hover{
    background-color:#000;
    border-radius:10px;
    color:#fff;
}
/* CSS for the marquee element */
marquee {
  font-size: 20px; /* Set the font size */
  font-weight: bold; /* Make the text bold */
  padding-left: 20px; /* Add left padding for spacing */
}
.navbar-header{
    background-color:#1B55A3;
}
</style>