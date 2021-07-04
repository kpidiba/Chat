@extends('layouts.head')

@section('title')
    Chat en temps Reel
@endsection

@section('style')
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="#" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                <img src="user.png" alt="">
                <div class="details">
                    <span>Coding David</span>
                    <p>Connecte</p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit eligendi laboriosam aut quam nihil, voluptas, consequatur expedita harum, culpa illum similique aspernatur ex porro rerum molestiae consequuntur ipsa autem voluptatem?</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="user.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit eligendi laboriosam aut quam nihil, voluptas, consequatur expedita harum, culpa illum similique aspernatur ex porro rerum molestiae consequuntur ipsa autem voluptatem?</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection