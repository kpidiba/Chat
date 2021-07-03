@extends('layouts.head')

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
            <input type="text" placeholder="Search Your Friend ">
            <div class="autocom-box">
                <li>Broter in arms</li>
                <li>Don't want this</li>
                <li>Push up</li>
                <li>Make this</li>
            </div>
            <div class="icon"><i class="fa fa-search"></i></div>
        </div>
    </div>
    akakakak
</div>
@endsection