<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewListPertanyaan(){
        $pertanyaans = [
            [
                'judul' => 'judul 1 aja',
                'body' => 'body pertanyaannya adalah ini',
                'author' => 'Saya sendiri',
            ],
            [
                'judul' => 'judul 2 aja',
                'body' => 'body pertanyaannya adalah ini',
                'author' => 'Anda sendiri',
            ]
        ];
        
        return view('List-pertanyaan',['pertanyaan' => $pertanyaans]);
    }

    public function viewDashboard(){
        $pertanyaans = [
            [
                'judul' => 'judul 1 aja di dashboard',
                'body' => 'body pertanyaannya adalah ini',
                'author' => 'Saya sendiri',
            ],
            [
                'judul' => 'judul 2 aja',
                'body' => 'body pertanyaannya adalah ini',
                'author' => 'Anda sendiri',
            ]
        ];

        return view('dashboard',['pertanyaanDashboard' => $pertanyaans]);
    }

    public function viewListPengguna(){
        $users = User::all();
        return view('List-Pengguna',['users' => $users]);
    }

    public function viewCategory(){
        $kategori = Kategori::all();
        return view('Category',['kategori' => $kategori]);
    }

    public function viewPertanyaanUser(Request $request){
        $pertanyaan = Pertanyaan::all();
        return view('List-pertanyaan',['pertanyaan'=>$pertanyaan]);
    }

    public function viewTanya(Request $request){
        $kategori = Kategori::all();
        return view('Tanya',['kategori' => $kategori]);
    }

    public function viewProfil(Request $request){
        return view('Profil');
    }
}
