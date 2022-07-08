<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\GambarPertanyaan;
use App\Models\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Input Pertanyaan ke Database
     */
    public function store(Request $request){
        $request->validate([
            'judul' => 'required|string',
            'body' => 'required|string',
            'overview' => 'required|string',
            'kategori' => 'required|integer|exists:kategoris,id',
        ]);
        try {
            $user = auth()->user();
            $request->merge([
                'kategori_id' => $request->kategori,
                'user_id' => $user->id,
                'waktu_tanya' => Carbon::now()->toDateTimeString(),
            ]);
            $images = json_decode($request->images);
            $pertanyaan = Pertanyaan::create($request->all());
            foreach ($images as $image) {
                $gambar = GambarPertanyaan::where('url',$image)->first();
                $gambar->pertanyaan_id = $pertanyaan->id;
                $gambar->save();
            }
            // delete gambar that does not have pertanyaan_id
            $gambar = GambarPertanyaan::whereNull('pertanyaan_id')->delete();
            return redirect('/list-pertanyaan')->with('info','sukses input pertanyaan');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
