<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){
        return view('game',['bar'=>2]);
    }

    public function snake(){
    }

    public function hero(){
        return view('games/hero/index');
    }

    public function pingpong(){
        return view('games/ping-pong/index');
    }
}
