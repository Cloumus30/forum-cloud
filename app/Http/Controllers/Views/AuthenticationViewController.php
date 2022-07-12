<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationViewController extends Controller
{
    public function viewRegister(){
        $user = auth()->user();
        if($user){
            return redirect('/dashboard')->with('info','Anda Sudah Login');   
        }
        return view('daftar');
    }

    public function viewLogin(){
        $user = auth()->user();
        if($user){
            return redirect('/dashboard')->with('info','Anda Sudah Login');   
        }
        return view('login');
    }
}
