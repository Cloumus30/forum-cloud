<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewListPertanyaan(){
        $pertanyaan = Pertanyaan::paginate();
        return view('List-pertanyaan',['pertanyaan' => $pertanyaan]);
    }

    public function viewDashboard(){
        $user = auth()->user();
        $pertanyaan = Pertanyaan::take(6)->get();
        $jumlahPertanyaan = Pertanyaan::count();
        $jumlahJawaban = Jawaban::where('user_id',$user->id)->count();
        $jumlahKategori = Kategori::count();

        return view('dashboard',[
            'pertanyaanDashboard' => $pertanyaan,
            'jumlahPertanyaan' => $jumlahPertanyaan,
            'jumlahJawaban' => $jumlahJawaban,
            'jumlahKategori' => $jumlahKategori,
        ]);
    }

    public function viewListPengguna(){
        $users = User::withCount(['pertanyaan as jumlah_pertanyaan','jawaban as jumlah_jawaban'])->paginate();
        return view('List-Pengguna',['users' => $users]);
    }

    public function viewCategory(){
        $kategori = Kategori::with('pertanyaan')->orderBy('updated_at','desc')->paginate();
        return view('Category',['kategori' => $kategori]);
    }

    public function viewPertanyaanUser(Request $request){
        $pertanyaan = Pertanyaan::paginate();
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
        $user = auth()->user();
        $userData = User::with('gambarUser')
                ->withCount(['pertanyaan as jumlah_pertanyaan','jawaban as jumlah_jawaban'])
                ->find($user->id);
        
        return view('Profil',['user' => $userData,'isOwnProfil'=>true]);
    }
}
