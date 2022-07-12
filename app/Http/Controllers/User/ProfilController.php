<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GambarUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function storeUpdateImage(Request $request){
        try {
            $validator = Validator::make($request->all(),[
                'image' => 'required|file',
            ]);
            $user = auth()->user();
            if($validator->fails()){
                abort(400,$validator->errors()->first());
            }
            $currentGambar = GambarUser::where('user_id',$user->id)->first();
            if($currentGambar){
                Storage::delete('public/image/profil/'.$currentGambar->nama);
            }
            $file = $request->file('image');
            $fileExt = $file->extension();
            $fileSize = $file->getSize();
            $userId = $user->id;
            $fileName = "IMG-PRF-$userId.$fileExt";
            $path = $file->storeAs('/public/image/profil',$fileName);
            $url = Storage::url($path);

            $gambar = GambarUser::updateOrcreate(['user_id' => $user->id],[
                'nama' => $fileName,
                'url' => $url,
                'size' => $fileSize,
                'user_id' => $user->id,
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
