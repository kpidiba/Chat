<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAuth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/man',function(){
    dd('hello world');
})->middleware(UserAuth::class);;

// Enregistrement de l' utilisateur
Route::get('/registers',[UserController::class,'register'])->name('user.register');
Route::post('/registers',[UserController::class,'store'])->name('user.store');

// Authentification
Route::get('/',[UserController::class,'login'])->name('user.login');
Route::post('/',[UserController::class,'connect'])->name('user.connect');

Route::get('/home',[UserController::class,'home'])->name('user.home');



