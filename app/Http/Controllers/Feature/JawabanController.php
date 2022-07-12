<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\GambarJawaban;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JawabanController extends Controller
{
    /**
     * store jawaban
     */
    public function store(Request $request){
        try {
            $request->validate([
                'body' => 'required|string',
                'pertanyaan_id' => 'required|integer',
            ]);
            $user = auth()->user();
            $request->merge([
                'user_id' => $user->id,
            ]);
            $images = json_decode($request->images);

            $jawaban = Jawaban::create($request->all());
            // input Gambar
            if(count($images)){
                foreach ($images as $image) {
                    $img = GambarJawaban::where('url',$image)->first();
                    $img->jawaban_id = $jawaban->id;
                    $img->save();
                }
            }

            // delete gambar that does not have pertanyaan_id
            $this->deleteImageNullJawaban(); 

            return redirect('/pertanyaan/'.$request->pertanyaan_id)->with('info','Jawaban Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

     //function to delete gambar that does not have jawaban_id
     public function deleteImageNullJawaban(){
        
        $gambar = GambarJawaban::whereNull('jawaban_id');
        $gambarDeleteFile = $gambar->get();
        $gambar->delete();
        foreach ($gambarDeleteFile as $gbr) {
            $pathDel = "/public/image/jawaban/";
            Storage::delete($pathDel.$gbr->nama);
        }
    }
}
