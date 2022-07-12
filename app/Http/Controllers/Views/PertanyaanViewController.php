<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanViewController extends Controller
{
    /**
     * View Question
     */
    public function view(Request $request,$id){
        try {
            $user = auth()->user();
            $pertanyaan = Pertanyaan::with(['user'])
                    ->with(['jawaban.user' => function($query){
                        $query->withCount(['pertanyaan AS jumlah_pertanyaan','jawaban AS jumlah_jawaban']);
                    }])
                    ->find($id);
            $jawaban = Jawaban::where('pertanyaan_id', $id)->where('user_id',$user->id)->first();
            $isJawab = $jawaban ?? false;
            $time = Carbon::parse($pertanyaan->waktu_tanya)->locale('id')->diffForHumans(Carbon::now());
            // dd($time);
            return view('Pertanyaan',[
                'pertanyaan' => $pertanyaan, 
                'waktu' => $time,
                'isJawab' => $isJawab,
                'userId' => $user->id,
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
