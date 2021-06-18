@extends('layouts.head')

@section('title')
    Authentification
@endsection

@section('style')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('js/script.js') }}">
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
        <form action="#">
            <i class="bi bi-align-center"></i>
            <div class="field email">
                <div class="input-area">
                    <input type="text" name="username" placeholder="email adress">
                    <i class="icon fa fa-envelope"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Email or username can't be blank</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" name="username" placeholder="password">
                    <i class="icon fa fa-lock"></i>
                    <i class="error error-icon fa fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Password can't be blank</div>
            </div>
            <div class="pass-link"><a href="#">Mot de passe oublie?</a></div>
            <input type="submit" value="login">
        </form>
        <div class="signup-link">Vous avez un compte?<a href="#">S'inscrire</a></div>
    </div>
@endsection

