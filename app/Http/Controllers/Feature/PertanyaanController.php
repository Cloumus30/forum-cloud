<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\GambarPertanyaan;
use App\Models\Pertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PertanyaanController extends Controller
{
    /**
     * Input Pertanyaan ke Database
     */
    public function store(Request $request){
        // return $request->all();
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

            // Update pertanyaan_id in GambarPertanyaan
            $pertanyaan = Pertanyaan::create($request->all());
            
            if(count($images)){
                foreach ($images as $image) {
                    $img = GambarPertanyaan::where('url',$image)->first();
                    $img->pertanyaan_id = $pertanyaan->id;
                    $img->save();
                }
            }

            // delete gambar that does not have pertanyaan_id
            $this->deleteImageNullPertanyaan(); 

            return redirect('/list-pertanyaan')->with('info','sukses input pertanyaan');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Input Pertanyaan ke Database
     */
    public function update(Request $request, $id){
        // return $request->all();
        $request->validate([
            'judul' => 'required|string',
            'body' => 'required|string',
            'overview' => 'required|string',
            'kategori' => 'required|integer|exists:kategoris,id',
        ]);
        try {
            $pertanyaan = Pertanyaan::with('gambar')->find($id);
            $request->merge([
                'kategori_id' => $request->kategori,
            ]);
            $currentImg = $pertanyaan->gambar;
            $images = json_decode($request->images);
            // check diff in current images and updated images
            $deleteUrl = $this->getDiffImages($currentImg,$images);
            // dd($deleteUrl);
            // Update pertanyaan_id in GambarPertanyaan
            $pertanyaan->update($request->all());
            if(count($images)){
                foreach ($images as $image) {
                   $img = GambarPertanyaan::where('url',$image)->first();
                   $img->pertanyaan_id = $pertanyaan->id;
                   $img->save();
                }
            }

             // delete gambar that does not belongs To pertanyaan
             $gambar = GambarPertanyaan::whereIn('url',$deleteUrl)->orWhereNull('pertanyaan_id',null);
             $gambarDeleteFile = $gambar->get();
             $gambar->delete();
             foreach ($gambarDeleteFile as $gbr) {
                 $pathDel = "/public/image/pertanyaan/";
                 Storage::delete($pathDel.$gbr->nama);
             }

            return redirect('/list-pertanyaan')->with('info','sukses update pertanyaan');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

    //function to delete gambar that does not have pertanyaan_id
    public function deleteImageNullPertanyaan(){
        
        $gambar = GambarPertanyaan::whereNull('pertanyaan_id');
        $gambarDeleteFile = $gambar->get();
        $gambar->delete();
        foreach ($gambarDeleteFile as $gbr) {
            $pathDel = "/public/image/pertanyaan/";
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
