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

// Route::GET('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::GET('/man',function(){
    dd('hello world');
})->middleware(UserAuth::class);

// Enregistrement de l' utilisateur
Route::GET('/register',[UserController::class,'register'])->name('user.register');
Route::POST('/register',[UserController::class,'store'])->name('user.store');

Route::POST('/registers',function(){
    return "man with a mission";
});
// Route::GET('/register',function(){
//     return "";
// });

// Authentification
Route::GET('/',[UserController::class,'login'])->name('user.login');
Route::POST('/',[UserController::class,'connect'])->name('user.connect');

//page principale
Route::GET('/home',[UserController::class,'home'])->name('user.home')->middleware(UserAuth::class);

//Route de deconnection
Route::GET('/diconnect',[UserController::class,'disconnect'])->name('user.disconnect');

//page pour changer la photo de l' utilisateur
Route::GET('/file',[UserController::class,'file'])->name('user.file')->middleware(UserAuth::class);

//page de chat
Route::GET('/chat',[UserController::class,'chat'])->name('user.chat')->middleware(UserAuth::class);

//Route pour verifier si les utilisateurs sont connecte
Route::GET('/status',[UserController::class,'status'])->name('user.status');