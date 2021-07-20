@extends('pages.nav-bar')

@section('title')
    Page d' amis
@endsection

@section('style')
    {{-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> --}}
@endsection

@section('content') 
<div class="popup">

    <div class="popup-content">
        <i class="fa fa-close close"></i>
        <div class="content">
            <div class="tab_content">
                <ul style="list-style: none;">
                    <li  data-li="prop" class="active inv-center" >Propositions</li>
                    <li  data-li="unread" class=" propo-center">Invitations</li>
                </ul>
            </div>
            
            <div class="inbox">
                <ul style="list-style: none;">
                    <li>
                        <div id="listp" class="zll prop">
                            
                        </div>
                        
                    </li>
                    
                    <li>
                        <div id="listv" class="zll unread">
                            
                        </div>
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection