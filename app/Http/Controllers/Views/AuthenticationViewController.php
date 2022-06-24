<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationViewController extends Controller
{
    public function viewRegister(){
        return view('daftar');
    }

    public function viewLogin(){
        return view('login');
    }
}
