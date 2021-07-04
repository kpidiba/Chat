<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="shortcut icon" type="image/x-icon" href="icon.png">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('css/head.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        @yield('style')
        @yield('script')
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" id="mca_app">
    
                <section class="col-12" id="mca_side_bar">
                    <div class="chat_profile">
                        <img src="user.png" alt="">
                        <span>Profile</span>
                    </div>
                    <div class="chat_menu">
                        <ul>
                            <li class="active">
                                <i class="fa fa-user"></i>
                                <span class="icon-button__badge">2</span>
                            </li>
                            <li ><i class="fa fa-bell"></i></li>
                            <li ><i class="fa fa-users"></i></li>
                            <li ><i class="fa fa-google"></i></li>
                            
                            <li ><i class="fa fa-envelope"></i></li>
                        </ul>
                    </div>
                    <div class="chat_bar">
                        <i class="fa fa-bars"></i>
                    </div>
                </section>
            </div>
        </div>    
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </body>
</html>