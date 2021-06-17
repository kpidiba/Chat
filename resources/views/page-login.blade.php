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
        <form action="#">
            <div class="field email">
                <div class="input-area">
                    <input type="text" name="username" placeholder="email or username">
                    <i class="fas fa-envelope"></i>
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="error-txt">Email or username can't be blank</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" name="username" placeholder="password">
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="error-txt">Password can't be blank</div>
            </div>
            <div class="pass-link"><a href="#">Mot de passe oublie?</a></div>
            <input type="submit" value="login">
        </form>
        <div class="signup-link"><a href="#">Inscription</a></div>
    </div>
@endsection

