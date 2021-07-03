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
                    <img src="icon.png" alt="">
                    <span>Profle</span>
                </div>
                <div class="chat_menu">
                    <ul>
                        <li class="active"><i class="fa fa-bell"></i></li>
                        <li ><i class="fa fa-file-text"></i></li>
                        <li ><i class="fa fa-compass"></i></li>
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

@endsection