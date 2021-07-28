<?php

use App\Http\Controllers\Friend;
use App\Http\Controllers\GameController;
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
    // return view('welcome');
// });

// Auth::routes();

// Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::GET('/home',[UserController::class,'home'])->name('user.home')->middleware('auths','revalidate');

//Route de deconnection
Route::GET('/disconnect',[UserController::class,'disconnect'])->name('user.disconnect');

//page pour changer la photo de l' utilisateur
Route::GET('/file',[UserController::class,'file'])->name('user.file')->middleware('auths','revalidate');
Route::POST('/file',[UserController::class,'filechange'])->name('user.filechange')->middleware('auths','revalidate');

//page de chat
Route::GET('/chat',function(){
    return redirect()->route('user.home');
})->name('chat');
Route::GET('/chat/{id}',[UserController::class,'chat'])->name('user.chat')->middleware('auths','revalidate');
Route::POST('/chat/{id}',[UserController::class,'message'])->name('user.msg')->middleware('auths','revalidate');

//Route pour verifier si les utilisateurs sont connecte
Route::GET('/status',[UserController::class,'status'])->name('user.status');

//Route pour le chat /getChat
Route::POST('/getChat',[UserController::class,'gChat'])->name('user.gChat');

//Les Parametres du compte
Route::GET('/setting',[UserController::class,'setting'])->name('user.setting')->middleware('auths','revalidate');

//liste des invitations et liste des propositions
Route::GET('/propo',[Friend::class,'listPropo'])->name('friend.propo')->middleware('auths','revalidate');
Route::GET('/inve',[Friend::class,'listInvE'])->name('friend.invE')->middleware('auths','revalidate');
Route::GET('/invr',[Friend::class,'listInvR'])->name('friend.invR')->middleware('auths','revalidate');
//Route pour ajout ou invitations d 'amis
Route::GET('/Friend',[Friend::class,'index'])->name('friend.index')->middleware('auths','revalidate');;
Route::GET('/addFriend/{id}',[Friend::class,'add'])->name('friend.add');
Route::GET('/addFriend',function(){
    return redirect()->route('user.home');
})->name('add');
Route::POST('search',[Friend::class,'search'])->name('friend.search')->middleware('auths','revalidate');

//partie pour les jeux hardcore

Route::GET('/Games',[GameController::class,'index'])->name('game.index')->middleware('auths','revalidate');