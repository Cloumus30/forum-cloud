<?php

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
Route::get('/login', [AuthenticationViewController::class,'viewLogin']);
Route::get('/register', [AuthenticationViewController::class,'viewRegister']);
