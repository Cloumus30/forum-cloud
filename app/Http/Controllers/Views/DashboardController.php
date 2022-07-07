<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
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
        
        return view('List-pertanyaan',['pertanyaanControl' => $pertanyaans]);
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
        $categories = Kategori::all();
        return view('Category',['categories' => $categories]);
    }
}
