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
                <li>Broter in arms</li>
                <li>Don't want this</li>
                <li>Push up</li>
                <li>Make this</li>
            </div>
            <div class="icon"><i class="fa fa-search"></i></div>
        </div>
        <button class="btn  btn-add"><i class="fa fa-plus">ADD FRIEND</i></button>
    </div>

    <div class="friends">
        <div class="users-list">
            <a href="">
                <div class="content">
                    <img src="user.png" alt="">
                    <div class="details">
                        <span>Coding David</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot"><i class="fa fa-circle"></i></div>
            </a><a href="">
                <div class="content">
                    <img src="user.png" alt="">
                    <div class="details">
                        <span>Coding David</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot"><i class="fa fa-circle"></i></div>
            </a><a href="">
                <div class="content">
                    <img src="user.png" alt="">
                    <div class="details">
                        <span>Coding David</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot"><i class="fa fa-circle"></i></div>
            </a><a href="">
                <div class="content">
                    <img src="user.png" alt="">
                <div class="details">
                        <span>Coding David</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot">
                    <i class="fa fa-circle"></i>
                </div>
            </a>
            <a href="">
                <div class="content">
                    <img src="user.png" alt="">
                <div class="details">
                        <span>Coding David</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot">
                    <i class="fa fa-circle"></i>
                </div>
            </a>
        </div>

    </div>
</div>

@endsection