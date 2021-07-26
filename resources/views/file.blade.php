@extends('layouts.head')

@section('title')
    User Image
@endsection

@section('style')
    <link href="{{ asset('css/file.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if ( session()->has('failed') )
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ session()->get('failed') }}.
        </div>
    @endif
    <div class="container">
        <div class="wrapper">
            <div class="image">
                <img src="IMAGE/{{ session('image') }}" alt="">
            </div>
            <div class="content" >
                <div class="icon"><i class="fa fa-cloud-upload"></i></div>
                <div class="text">Aucun fichier choisie</div>
            </div>
            <div id="cancel-btn"><i class="fa fa-times"></i></div>
            <div class="file-name">File name here</div>
        </div>
        <br>
        
        <form  method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="default-btn" accept="image/*" hidden>
            <button onclick="defaultBtnActive()" id="custom-btn"  hidden>Choose a file</button>
            <button id="custom-btn" type="submit">changer</button>
        </form>
            
    </div> 

    <script src="{{ asset('js/file.js') }}"></script>

@endsection