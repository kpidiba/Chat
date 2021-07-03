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
                <img src="" alt="">
            </div>
            <div class="content">
                <div class="icon"><i class="fa fa-cloud-upload"></i></div>
                <div class="text">Aucun fichier choisie</div>
            </div>
            <div id="cancel-btn"><i class="fa fa-times"></i></div>
            <div class="file-name">File name here</div>
        </div>
        <br>
        <input type="file" id="default-btn" hidden>
        <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
        <button id="custom-btn">Ignore</button>
    </div>

    <script>
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");
        const img = document.querySelector("img");
        function defaultBtnActive(){
            defaultBtn.click();
        }
        defaultBtn.addEventListener("change",function(){
            const file = this.files[0];
            if(file){
                const reader = new FileReader();
                reader.onload = function(){
                    const result = reader.result;
                    img.src = result;
                }
                reader.readAsDataURL(file);
            }
            
        });
    </script>
@endsection