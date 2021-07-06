@extends('layouts.head')

@section('title')
    User Image
@endsection

@section('style')
    <link href="{{ asset('css/file.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="wrapper">
            <div class="image">
            @if({{ route('/', ['id'=>1]) }})
                
            @endif
                <img src="user.png" alt="">
            </div>
            <div class="content" >
                <div class="icon"><i class="fa fa-cloud-upload"></i></div>
                <div class="text">Aucun fichier choisie</div>
            </div>
            <div id="cancel-btn"><i class="fa fa-times"></i></div>
            <div class="file-name">File name here</div>
        </div>
        <br>
        <input type="file" id="default-btn" hidden>
        <button onclick="defaultBtnActive()" id="custom-btn" hidden>Choose a file</button>
        <button id="custom-btn" >change</button>
    </div>  

    <script src="{{ asset('js/file.js') }}"></script>

@endsection