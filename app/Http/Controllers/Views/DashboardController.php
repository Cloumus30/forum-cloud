<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
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
}
