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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Start Fast Food Css -->
      <link href="{{ asset('catalog/view/javascript/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/theme/jetimpex794/stylesheet/material-design.css') }}" rel="stylesheet">   
      <link href="{{ asset('catalog/view/theme/jetimpex794/stylesheet/fl-bigmug-line.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/theme/jetimpex794/stylesheet/material-icons.css') }}" rel="stylesheet">
      
      <link href="{{ asset('catalog/view/theme/jetimpex794/stylesheet/restaurant.css') }}" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Muli:300,400,600,700,800&amp;subset=latin-ext,vietnamese" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Bitter:400,400i,700" rel="stylesheet">
      <link href="{{ asset('catalog/view/javascript/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/theme/jetimpex794/js/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/theme/jetimpex794/stylesheet/photoswipe.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/theme/default/stylesheet/homebuilder.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/javascript/jquery/swiper/css/swiper.min.css') }}" rel="stylesheet">
      <link href="{{ asset('catalog/view/javascript/jquery/swiper/css/opencart.css') }}" rel="stylesheet">

      <link href="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_google_map/jetimpex_google_map.css') }}" rel="stylesheet">
    <!--End Fast Food Css -->
    <!--Start Fast Food Js -->
        <script src="{{ asset('catalog/view/javascript/jquery/jquery-2.1.1.min.js') }}" ></script>
        <script src="{{ asset('catalog/view/javascript/bootstrap/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/swiper/swiper.min.js') }}" ></script>
        <script src="{{ asset('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_single_category/bootstrap-tabcollapse.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_parallax/jquery.rd-parallax.min.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpexdealbanner/jquery.countdown.min.js') }}" ></script>
        <script src="//maps.googleapis.com/maps/api/js?sensor=true" type="text/javascript"></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_google_map/jquery.rd-google-map.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_megamenu/superfish.min.js') }}" ></script>
        <script src="{{ asset('catalog/view/theme/jetimpex794/js/jetimpex_megamenu/jquery.rd-navbar.min.js') }}" ></script>
        <link href=" {{ asset('catalog/view/theme/jetimpex794/stylesheet/stylesheet.css') }}" rel="stylesheet">
     <!--End Fast Food Js -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!-- Js -->

 <script src="{{ asset('catalog/view/theme/jetimpex794/js/device.min.js') }}" ></script>
 <script src="{{ asset('catalog/view/theme/jetimpex794/js/livesearch.min.js') }}" ></script>
 <script src="{{ asset('catalog/view/theme/jetimpex794/js/common.js') }}" ></script>
 <script src="{{ asset('catalog/view/theme/jetimpex794/js/script.js') }}" ></script>
<!-- End Js -->
</body>
</html>
