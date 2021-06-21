<!DOCTYPE html>
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>

a, a:hover{
    color: black;
    font-weight: 700;
}

.one {
  width: 60%;
  width: 500px;
  height: 500px;
  float: left;
}

.two {
  margin-left: 15%;
  height: 200px;
}

a.header {
        margin-right: 15px;
    }

* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33%;
  padding: 10px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

figure {
    width: 300px;
    height: 300px;
    margin: 0;
    padding: 0;
    background: #fff;
    overflow: hidden;
}

.hover12 figure {
    background: #020300;

}
.hover12 figure img {
    position: relative;
    opacity: 1;
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;

    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}
.hover12 figure:hover img {
    opacity: .7;
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

.overlayTst{
    position: absolute;
    bottom: -13px;


}

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a style="margin-left: 72px" class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/instagram.png') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @yield('header-section')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" style="margin-right: 72px" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php $avatar = App\User::where('id', Auth::user()->id)->firstOrFail()->avatar;
                                    ?>
                                        <img style="border-radius: 50%" width="30px" height="30px" src="{{ asset('images'."/".$avatar) }}"> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', ["username"=>Auth()->user()->username]) }}">
                                        <img width="17px" height="17px" style="margin-right: 10px" src="{{ asset('images/profile_icon.png') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="#saved">
                                        <img width="17px" height="17px" style="margin-right: 10px" src="{{ asset('images/saved.png') }}">
                                        {{ __('Saved') }}
                                    </a>
                                    <a class="dropdown-item" href="#settings">
                                        <img width="17px" height="17px" style="margin-right: 10px" src="{{ asset('images/settings.png') }}">
                                        {{ __('Settings') }}
                                    </a>
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
