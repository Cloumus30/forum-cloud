<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PertanyaanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    /**
     * List Semua Pertanyaan
     */
    public function index(PertanyaanRepository $repository){
        try {
            $data = $repository->listPaginate();
            return response()->json([
                'message' => 'Success Get',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'error' => $th->getmessage(),
            ],400);
        }
    }

    /**
     * View Pertanyaan Detail
     */
    public function view($pertanyaanId, PertanyaanRepository $repository){
        try {
            $data = $repository->getOne($pertanyaanId);
            return response()->json([
                'message' => 'Success Get',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed Request',
                'error' => $th->getmessage(),
            ],400);
        }
    }

     /**
      * Insert Pertanyaan Data
      */
      public function store(Request $request, PertanyaanRepository $repository){
        try {
            $validator = Validator::make($request->all(),[
                'judul' => 'required',
                'body' => 'required',
                'overview' => 'required',
                'quill_delta' => 'required',
                'kategori_id' => 'required',
            ]);
            if($validator->fails()){
                return response()->json([
                    'message'=> 'Failed Request',
                    'error' => $validator->errors()
                ],400);
            }
            $user = auth()->user();
            $data = null;
            DB::transaction(function() use($repository,$request,$user){
                $data = $repository->store($request, $user);
            });
            
            return response()->json([
                'message' => 'Success Insert',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed Request',
                'error' => $th->getmessage(),
            ],400);
        }
      }

      /**
       * Update Pertanyaan Data
       */
}
