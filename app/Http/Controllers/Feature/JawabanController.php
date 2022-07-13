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
        $request->validate([
            'body' => 'required|string',
            'pertanyaan_id' => 'required|integer',
        ]);
        try {
           
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

    public function update(Request $request, $id){
          // return $request->all();
        $request->validate([
        'body' => 'required|string',
        ]);
        try {
            $jawaban = Jawaban::with('gambar')->find($id);
            // $request->merge([
            //     'kategori_id' => $request->kategori,
            // ]);
            $currentImg = $jawaban->gambar;
            $images = json_decode($request->images);
            // check diff in current images and updated images
            $deleteUrl = $this->getDiffImages($currentImg,$images);
            // dd($deleteUrl);
            // Update pertanyaan_id in GambarPertanyaan
            $jawaban->update($request->all());
            if(count($images)){
                foreach ($images as $image) {
                   $img = GambarJawaban::where('url',$image)->first();
                   $img->jawaban_id = $jawaban->id;
                   $img->save();
                }
            }

             // delete gambar that does not belongs To pertanyaan
             $gambar = GambarJawaban::whereIn('url',$deleteUrl)->orWhereNull('jawaban_id',null);
             $gambarDeleteFile = $gambar->get();
             $gambar->delete();
             foreach ($gambarDeleteFile as $gbr) {
                 $pathDel = "/public/image/jawaban/";
                 Storage::delete($pathDel.$gbr->nama);
             }

             return redirect('/pertanyaan/'.$jawaban->pertanyaan_id)->with('info','Jawaban Berhasil DiUpdate');
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

     // function to get different current images with updated images
     public function getDiffImages($currentImages, $updatedImages){
        $countDiff = 0;
        $currentUrl = [];
        foreach ($currentImages as $img) {
            array_push($currentUrl,$img->url);
        }
        $deleteUrl = array_diff($currentUrl,$updatedImages);
        return $deleteUrl;
    }
}
