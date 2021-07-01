<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/man',function(){
    dd('hello world');
});

Route::get('/',[UserController::class,'login'])->name('user.login');

Route::get('/registers',[UserController::class,'register'])->name('user.register');

Route::get('/index',[UserController::class,'index'])->name('user.index');


