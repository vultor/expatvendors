<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expat Vendors - Buy Stuff from Expats in Korea</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- phone icon-->
        <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">
        <link rel="apple-touch-icon" sizes="57x57" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="http://expatvendors.com/assets/img/icons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="http://expatvendors.com/assets/img/icons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="http://expatvendors.com/assets/img/icons/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="http://expatvendors.com/assets/img/icons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="http://expatvendors.com/assets/img/icons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="http://expatvendors.com/assets/img/icons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="http://expatvendors.com/assets/img/icons/manifest.json">
        <link rel="mask-icon" href="http://expatvendors.com/assets/img/icons/safari-pinned-tab.svg" color="#bd3d3d">
        <link rel="shortcut icon" href="http://expatvendors.com/assets/img/icons/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="msapplication-TileImage" content="http://expatvendors.com/assets/img/icons/mstile-144x144.png">
        <meta name="msapplication-config" content="http://expatvendors.com/assets/img/icons/browserconfig.xml">
        <meta name="theme-color" content="#bd3d3d">
        <!-- end phone icons -->

    <!-- Styles -->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {!! HTML::style('/assets/css/bootstrap-custom.min.css') !!}
    {!! HTML::style('/assets/css/expat.css') !!}
</head>
<body>
    <nav class="navbar navbar-blue">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span>
                        @if (!Auth::guest())
                        <i class="fa fa-btn fa-user"></i>
                        @endif
                        Menu</span>
                </button>

                <!-- Branding Image -->
                <a href="/"><img alt="Expat Vendors logo" src={!! asset('assets/img/ev-logo-circle-50.png') !!}> Expat Vendors Korea</a> 
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        <li class="nav-username">Hi, {!! Auth::user()->name !!}</li>
                        <li><a href="/users/{!! Auth::user()->id !!}/edit">Edit Profile</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('_flash')
        
        @yield('content')
    </div>

    <footer>
        @yield('footer')
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Currency format with numeral.js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    {!! HTML::script('/assets/js/expat.js') !!}
</body>
</html>
