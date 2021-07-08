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
                <a href="{{ route('user.home') }}" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                <img src="../{{ $friend[0]->image }}" alt="">
                <div class="details">
                    <span>{{ $friend[0]->nom }} {{ $friend[0]->prenom }}</span>
                    @if ($friend[0]->status == 1)
                        <p>Connecter</p>
                    @else
                        <p>Deconnecter</p>
                    @endif
                    <p></p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="../{{ $friend[0]->image}}" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit eligendi laboriosam aut quam nihil, voluptas, consequatur expedita harum, culpa illum similique aspernatur ex porro rerum molestiae consequuntur ipsa autem voluptatem?</p>
                    </div>
                </div>
            </div>
            <form action="" class="typing-area">
                <input type="text" name="receveir_id" value="{{ $friend[0]->idUser }}" hidden>
                <input type="text" name="sender_id" hidden>
                <input type="text" placeholder="Ecris un Message">
                <button><i class="fa fa-send"></i></button>
            </form>
        </section>
    </div>
@endsection