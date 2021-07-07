@extends('layouts.head')

@section('title')
    Authentification
@endsection

@section('style')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection


@section('content')


    <div class="wrapper">
        <header>Login Form</header>
        <form method="post" >
            @csrf
            {{-- ERROR CHAMPS VIDES  --}}
                <div class="error-css alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> 
                </div>
            <div class="field email">
                <div class="input-area">
                    <input class="input-center" type="text" name="email" placeholder="email" autofocus required>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input class="input-center" type="password" name="password" placeholder="mot de passe" required>
                    <i class="fa fa-eye i-css"></i>
                </div>
            </div>
            <div class="pass-link"><a href="#">Mot de passe oublie?</a></div>
            <input type="submit" value="login">
        </form>
        <div class="signup-link">Vous avez un compte?<a href="{{ route('user.register') }}">S'inscrire</a></div>
    </div>
    
    <script src="{{ asset('js/login.js') }}" ></script>
@endsection

