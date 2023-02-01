<?php

use App\Http\Controllers\api\v1\AdsController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function() {
    Route::get('/LastAds',[AdsController::class,'index']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/events',[EventController::class,'index']);
});
