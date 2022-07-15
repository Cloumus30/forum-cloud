<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\GambarPertanyaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GambarPertanyaanController extends Controller
{
    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(),[
                'image' => 'required|file',
            ]);
            $time = Carbon::now()->format('his');
            if($validator->fails()){
                abort(400,$validator->errors()->first());
            }
            $file = $request->file('image');
            $fileExt = $file->extension();
            $fileSize = $file->getSize();
            $userId = auth()->user()->id;
            $fileName = "IMG-PTY-$time-$userId.$fileExt";
            $path = $file->storeAs('/public/image/pertanyaan',$fileName);
            $url = Storage::url($path);

            $gambar = GambarPertanyaan::create([
                'nama' => $fileName,
                'url' => $url,
                'size' => $fileSize,
            ]);

            return response()->json([
                'code' => 200,
                'message' => 'success upload',
                'url' => $url,
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed',
                'error' => $th->getMessage(),
            ],400);
        }
    }
}
