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
        $pertanyaan = Pertanyaan::with('user')->orderBy('id','desc')->paginate();

        foreach ($pertanyaan as $pertan ) {
            $userId = $pertan->user->id;
            $pertanyaanUserCount = Pertanyaan::where('user_id', $userId)->count();
            $jawabanUserCount = Jawaban::where('user_id', $userId)->count();
            $jawabanCount = Jawaban::where('pertanyaan_id',$pertan->id)->count();
            $pertan->user->jumlahPertanyaanUser =  $pertanyaanUserCount;
            $pertan->user->jumlahJawabanUser = $jawabanUserCount;
            $pertan->jumlahJawaban = $jawabanCount;
        }
        
        return view('List-pertanyaan',['pertanyaan' => $pertanyaan]);
    }

    public function viewDashboard(){
        $user = auth()->user();
        $pertanyaan = Pertanyaan::with(['user'=>function($query){

            $query->select(['nama','id'])
            ->withCount(['jawaban as jumlahJawabanUser','pertanyaan as jumlahPertanyaanUser']);
        },'kategori:id,nama'])
                ->withCount('jawaban as jumlahJawaban')->orderBy('id','desc')->take(6)->get();
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
        $users = User::with('gambarUser:id,url')->paginate();
        foreach ($users as $user ) {
            $pertanyaanCount = Pertanyaan::where('user_id', $user->id)->count();
            $jawabanCount = Jawaban::where('user_id', $user->id)->count();
            $user->jumlah_pertanyaan =  $pertanyaanCount;
            $user->jumlah_jawaban = $jawabanCount;
        }
        // return $users;
        return view('List-Pengguna',['users' => $users]);
    }

    public function viewCategory(){
        // return Kategori::get(['id','nama']);
        $user = auth()->user();
        $kategori = Kategori::with('user')->orderBy('updated_at','desc')->paginate();
        foreach ($kategori as $kateg ) {
            $pertanyaanCount = Pertanyaan::where('kategori_id', $kateg->id)->count();
            $kateg->jumlah_pertanyaan =  $pertanyaanCount;
        }
        return view('Category',['kategori' => $kategori,'userId' => $user->id]);
    }

    public function viewPertanyaanUser(Request $request){
        $pertanyaan = Pertanyaan::with(['user'=>function($query){

            $query->select(['nama','id'])
            ->withCount(['jawaban as jumlahJawabanUser','pertanyaan as jumlahPertanyaanUser']);
        },'kategori:id,nama'])
                ->withCount('jawaban as jumlahJawaban')->orderBy('id','desc')->paginate();
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
