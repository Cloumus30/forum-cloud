<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PertanyaanViewController extends Controller
{
    /**
     * View Question
     */
    public function view(Request $request,$id){
        try {
            $pertanyaan = Pertanyaan::with(['user','jawaban'])->find($id);
            $time = Carbon::parse($pertanyaan->waktu_tanya)->locale('id')->diffForHumans(Carbon::now());
            // dd($time);
            return view('Pertanyaan',['pertanyaan' => $pertanyaan, 'waktu' => $time]);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
