<?php

use App\Http\Controllers\Api\PertanyaanController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function(){
    Route::prefix('pertanyaan')->group(function(){
        Route::get('/',[PertanyaanController::class, 'index']);
        Route::get('/{pertanyaanId}',[PertanyaanController::class, 'view']);
        Route::post('/',[PertanyaanController::class, 'store']);
    });
});

