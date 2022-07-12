<?php

use App\Http\Controllers\Feature\GambarJawabanController;
use App\Http\Controllers\Feature\GambarPertanyaanController;
use App\Http\Controllers\Feature\JawabanController;
use App\Http\Controllers\Feature\KategoriController;
use App\Http\Controllers\Feature\PertanyaanController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\Views\AuthenticateController;
use App\Http\Controllers\Views\AuthenticationViewController;
use App\Http\Controllers\Views\DashboardController;
use App\Http\Controllers\Views\ListPertanyaanController;
use App\Http\Controllers\Views\PertanyaanViewController;
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
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
    Route::get('/list-pengguna', [DashboardController::class, 'viewListPengguna']);

    Route::get('/list-pertanyaan',[DashboardController::class, 'viewListPertanyaan']);
    Route::get('/pertanyaan-user',[DashboardController::class, 'viewPertanyaanUser']);
    Route::get('/pertanyaan/{id}',[PertanyaanViewController::class, 'view']);
    Route::get('/pertanyaan-edit/{id}',[DashboardController::class,'viewPertanyaan']);

    Route::get('/profil',[DashboardController::class, 'viewProfil']);
    Route::get('/tanya',[DashboardController::class, 'viewTanya']);
    Route::get('/list-kategori', [DashboardController::class, 'viewCategory']); 

    
});


Route::get('/login', [AuthenticationViewController::class,'viewLogin'])->name('login');
Route::get('/daftar', [AuthenticationViewController::class,'viewRegister']);
Route::get('/logout',[AuthenticationController::class, 'logout']);

/**
 * Routing Data
 */
Route::post('/daftar', [AuthenticationController::class,'register']);
Route::post('/login', [AuthenticationController::class,'login']);

Route::middleware('auth')->group(function(){
    Route::post('/kategori',[KategoriController::class, 'store']);
    Route::put('/kategori/{id}',[KategoriController::class, 'update']);

    Route::post('/pertanyaan',[PertanyaanController::class,'store']);
    Route::post('/gambar-pertanyaan',[GambarPertanyaanController::class, 'store']);
    Route::put('/pertanyaan-edit/{id}',[PertanyaanController::class,'update']);

    Route::post('/jawaban',[JawabanController::class, 'store']);
    Route::post('/gambar-jawaban',[GambarJawabanController::class, 'store']);

    Route::post('/gambar-profil',[ProfilController::class,'storeUpdateImage']);
});

