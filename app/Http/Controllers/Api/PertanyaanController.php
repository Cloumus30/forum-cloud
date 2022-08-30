<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PertanyaanRepository;
use Illuminate\Http\Request;

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
}
