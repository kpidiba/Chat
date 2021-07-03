@extends('layouts.head')

@section('title')
    Page de chat
@endsection

@section('style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row" id="mca_app">

            <section class="col-12" id="mca_side_bar">
                <div class="chat_profile">
                    <img src="user.png" alt="">
                    <span>Profle</span>
                </div>
                <div class="chat_menu">
                    <ul>
                        
                        <li ><i class="fa fa-user"></i></li>
                        <li ><i class="fa fa-compass"></i></li>
                        <li ><i class="fa fa-google"></i></li>
                        <li class="active">
                            <i class="fa fa-bell"></i>
                            <span class="icon-button__badge">2</span>
                        </li>
                        <li ><i class="fa fa-envelope"></i></li>
                    </ul>
                </div>
                <div class="chat_bar">
                    <i class="fa fa-bars"></i>
                </div>
            </section>
        </div>
    </div>

@endsection