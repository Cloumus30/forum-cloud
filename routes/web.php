<?php

use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\Views\AuthenticateController;
use App\Http\Controllers\Views\AuthenticationViewController;
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
/**
 * Routing View
 */
Route::get('/', function () {
    return view('landing');
});
Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::get('/list-pengguna', function(){
    return view('list-pengguna');
});
Route::get('/list-pertanyaan',function(){
    return view('list-pertanyaan');
});
Route::get('/pertanyaan',function(){
    return view('Pertanyaan');
});
Route::get('/profil',function(){
    return view('Profil');
});
Route::get('/tanya',function(){
    return view('Tanya');
});
Route::get('/category', function(){
    return view('Category');
});
Route::get('/login', [AuthenticationViewController::class,'viewLogin']);
Route::get('/daftar', [AuthenticationViewController::class,'viewRegister']);

/**
 * Routing Data
 */
Route::post('/daftar', [AuthenticationController::class,'register']);
Route::post('/login', [AuthenticationController::class,'login']);
