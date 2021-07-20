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
                        @if( session('image') != 'user.png' )
                            <img src="IMAGE/{{ session('image') }}" alt="">
                            <span>Profile</span>                                
                        @else
                            <img src="user.png" alt="">
                            <span>Profile</span>
                        @endif
                        
                    </div>
                    <div class="menu">
                        <ul>
                                <li class="user-id"><span> {{ session('email') }} </span></li>
                                <li><i class="fa fa-user"></i><a href="{{ route('user.setting') }}"><span> Editer Profile</span></a></li>
                                <input type="submit" hidden>
                                <li class="line"><i class="fa fa-sign-out"></i><a href="{{ route('user.disconnect') }}"><span> Deconnecter</span></a></li>
                        </ul>
                    </div>
                    <div class="chat_menu">
                        <ul>
                            {{-- For HOMES (: --}}
                            @if ($bar == 1)
                                <a href="{{route('user.home')}}">
                                    <li class="active">
                                        <i class="fa fa-home"></i>
                                        <span class="icon-button__badge">0</span>
                                    </li>
                                </a>
                                <a href="{{route('game.index')}}">
                                    <li ><i class="fa fa-play"></i></li>
                                </a>
                                <a href="{{route('friend.index')}}">
                                    <li ><i class="fa fa-user"></i></li>
                                </a>
                                <a href="">
                                    <li ><i class="fa fa-bell"></i></li>
                                </a>
                            @elseif ($bar == 2)
                                <a href="{{route('user.home')}}">
                                    <li ><i class="fa fa-user"></i></li>
                                </a>
                                <a href="{{route('game.index')}}">
                                    <li class="active">
                                        <i class="fa fa-play"></i>
                                        <span class="icon-button__badge">0</span>
                                    </li>
                                </a>
                                <a href="{{route('friend.index')}}">
                                    <li ><i class="fa fa-user"></i></li>
                                </a>
                                <a href="">
                                    <li ><i class="fa fa-bell"></i></li>
                                </a>
                            @elseif ($bar == 3)
                                <a href="{{route('user.home')}}">
                                    <li ><i class="fa fa-user"></i></li>
                                </a>
                                <a href="{{route('game.index')}}">
                                    <li><i class="fa fa-play"></i></li>
                                </a>
                                <a href="{{route('friend.index')}}">
                                    <li class="active">
                                        <i class="fa fa-user"></i>
                                        <span class="icon-button__badge">0</span>
                                    </li>
                                </a>
                                <a href="">
                                    <li ><i class="fa fa-bell"></i></li>
                                </a>
                            @endif
                        </ul>
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
