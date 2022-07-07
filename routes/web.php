<?php

use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\Views\AuthenticateController;
use App\Http\Controllers\Views\AuthenticationViewController;
use App\Http\Controllers\Views\DashboardController;
use App\Http\Controllers\Views\ListPertanyaanController;
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
Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
Route::get('/list-pengguna', [DashboardController::class, 'viewListPengguna']);
Route::get('/list-pertanyaan',[DashboardController::class, 'viewListPertanyaan']);
Route::get('/pertanyaan',function(){
    return view('Pertanyaan');
});
Route::get('/profil',function(){
    return view('Profil');
});
Route::get('/tanya',function(){
    return view('Tanya');
});
Route::get('/list-kategori', [DashboardController::class, 'viewCategory']);
Route::get('/login', [AuthenticationViewController::class,'viewLogin']);
Route::get('/daftar', [AuthenticationViewController::class,'viewRegister']);

/**
 * Routing Data
 */
Route::post('/daftar', [AuthenticationController::class,'register']);
Route::post('/login', [AuthenticationController::class,'login']);
