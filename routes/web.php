<?php

use App\Http\Controllers\MainController;
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

Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'],function (){
    Route::get('/', function (){
        return view('pages.admin');
    })->name('main');
    Route::get('/ads', [MainController::class, 'ads'])->name('ads');
    Route::get('/sentences', [MainController::class, 'sentences'])->name('sentences');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/events', [MainController::class, 'events'])->name('events');
    Route::get('/editProfile',[MainController::class, 'editProfile'])->name('editProfile');
    Route::get('/editPassword',[MainController::class, 'editPass'])->name('editPass');
    Route::get('/logout',function (){
        Auth::logout();
        return redirect()->to('/login')->with('message','با موفقیت خارج شدید!');
    })->name('logout');
});

Route::get('/',[MainController::class, 'login'])->name('login');
Route::get('/login',[MainController::class, 'login'])->name('login');

