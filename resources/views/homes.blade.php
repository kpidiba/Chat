@php
    //Recuperation de tous les utilisateurs
    $users=session('users');
@endphp

@extends('pages.nav-bar')

@section('title')
    Page de chat
@endsection

@section('style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="bod" >
    <div class="wrapper">
        <div class="search-input">
            <input type="text" placeholder="Search Your Friend">
            <div class="autocom-box">
                
            </div>
            <div class="icon"><i class="fa fa-search"></i></div>
        </div>
    </div>

    <div class="friends">
        <div class="users-list">
            
        </div>

    </div>
</div>


<script src="{{ asset('js/home.js') }}" ></script>
@endsection

