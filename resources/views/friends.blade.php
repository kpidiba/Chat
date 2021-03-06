@extends('pages.nav-bar')

@section('title')
    Page d' amis
@endsection

@section('style')
    <link href="{{ asset('css/friend.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="bod">
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
                        <div class="container">
                            
                            <main class="grid">
                                
                                
                                
                            </main>
                        </div>
                    </div>
                    
                </li>
                
                <li>
                    <div id="listv" class="zll unread">
                        <div class="container" >
                            <h3>Invitations envoyees</h3>
                            <main class="grid" id="un">
                        
                        
                        
                            </main>
                        </div>
                        <div class="container" >
                            <h3>Invitations recuees</h3>
                            <main class="grid" id="deux">
                        
                        
                        
                            </main>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('js/friend.js') }}" ></script>
@endsection