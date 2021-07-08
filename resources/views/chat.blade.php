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
                
            </div>
            <form method="POST" class="typing-area">
                <input type="text" name="receveir_id" value="{{ $friend[0]->idUser }}" hidden>
                <input type="text" name="sender_id" value="{{ session('id') }}" hidden>
                <input type="text" name="message" class="input-field" placeholder="Ecris un Message">
                <button><i class="fa fa-send"></i></button>
            </form>
        </section>
    </div>
    <script src="{{ asset('js/chat.js') }}" ></script>

@endsection