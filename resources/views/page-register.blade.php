@extends('layouts.head')

@section('title')
    Creation de compte
@endsection

@section('style')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper">
        <section class="form signup" action="{{ route('register') }}" >
            <header>Register Form</header>
            <form method="POST" action="{{route('register') }}">
                <div class="name-details">
                    <div class="field">
                        <label>Nom</label>
                        <input class="input" type="text" name="nom" placeholder="NOM" autofocus required>
                    </div>
                    <div class="field">
                        <label>Prenom</label>
                        <input class="input" type="text" name="prenom" placeholder="PRENOM" required>
                    </div>
                </div>
                <div class="field">
                    <label>date de naissance</label>
                    <input class="input" type="date" name="date"  required>
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <input class="input" type="text" name="pass" placeholder="mot de passe" required>
                </div>
                <div class="field">
                    <label>email</label>
                    <input class="input" type="email" name="email" placeholder="email" required>
                </div>
                <div class="field">
                    <label>Select image</label>
                    <input class="input-file" type="file" name="file" required>
                </div>
                <div class="field">
                    <input class="input button" type="submit" value="Commencez le chat">
                </div>
                <div >Vous avez deja un compte?<a class="link" href="{{ route('user.login') }}">Se Connecter</a></div>
            </form>
        </section>
    </div>
@endsection

