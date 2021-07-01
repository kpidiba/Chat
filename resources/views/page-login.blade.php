@extends('layouts.head')

@section('title')
    Authentification
@endsection

@section('style')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection


@section('content')

  {{-- <button type="button" class="btn btn-primary btn-alarm">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<i class="fa fa-copy"></i>  
<i class="fa fa-save"></i>  
<i class="fa fa-trash"></i>  
<i class="fa fa-home"></i>   --}}
    <div class="wrapper">
        <header>Login Form</header>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="field email">
                <div class="input-area">
                    <input class="input-center" type="text" name="email" placeholder="email" autofocus required>
                    <i class="icon fa fa-envelope"></i>
                </div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input class="input-center" type="password" name="password" placeholder="mot de passe" required>
                    <i class="icon fa fa-lock"></i>
                </div>
            </div>
            <div class="pass-link"><a href="#">Mot de passe oublie?</a></div>
            <input type="submit" value="login">
        </form>
        <div class="signup-link">Vous avez un compte?<a href="{{ route('user.register') }}">S'inscrire</a></div>
    </div>
@endsection

