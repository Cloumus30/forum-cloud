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
        $pertanyaan = Pertanyaan::all();
        
        return view('List-pertanyaan',['pertanyaan' => $pertanyaan]);
    }

    public function viewDashboard(){
        $pertanyaan = Pertanyaan::all();

        return view('dashboard',['pertanyaanDashboard' => $pertanyaan]);
    }

    public function viewListPengguna(){
        $users = User::all();
        return view('List-Pengguna',['users' => $users]);
    }

    public function viewCategory(){
        $kategori = Kategori::with('pertanyaan')->orderBy('updated_at','desc')->get();
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

    public function viewPertanyaan(Request $request,$id){
        $pertanyaan = Pertanyaan::with('kategori','user')->find($id);
        $kategori = Kategori::all();
        return view('Tanya',['pertanyaan' => $pertanyaan,'kategori' => $kategori]);
    }

    public function viewProfil(Request $request){
        return view('Profil');
    }
}
