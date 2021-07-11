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
                <li>Broter in arms</li>
                <li>Don't want this</li>
                <li>Push up</li>
                <li>Make this</li>
            </div>
            <div class="icon"><i class="fa fa-search"></i></div>
        </div>
        <button class="btn  btn-add" id="button" ><i class="fa fa-plus">ADD FRIEND</i></button>
    </div>

    <div class="friends">
        <div class="users-list">
            
        </div>

    </div>
</div>

<div class="popup">

    <div class="popup-content">
        <i class="fa fa-close close"></i>
        <div class="content">
            
            <div class="tab_content">
                <ul style="list-style: none;">
                    <li  data-li="all" class="active inv-center" >Invitations</li>
                    <li  data-li="unread" class=" propo-center">Propositions</li>
                </ul>
            </div>
            
            <div class="inbox">
                <ul style="list-style: none;">
                    <li>
                        <div class="all">
                            <div class="li_left">
                                <img src="user.png" alt="friend image">
                            </div>
                            <div class="li_right">
                                <div class="message">
                                    <div class="title">Alex John</div>
                                    <div class="time_status">
                                        <button type="button" class="btn btn-info">Inviter</button>
                                        <div class="time">10M</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="all unread">
                            <div class="li_left">
                                <img src="" alt="friend image">
                            </div>
                            <div class="li_right">
                                <div class="message">
                                    <div class="title">Alex John</div>
                                    <div class="sub_title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius impedit fuga harum delectus odio iusto quas repellendus voluptate enim hic amet vero, culpa numquam? Perspiciatis architecto quia soluta quas animi.</div>
                                    <div class="time_status">
                                        <div class="time">10M</div>
                                        <div class="status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/home.js') }}" ></script>
@endsection

