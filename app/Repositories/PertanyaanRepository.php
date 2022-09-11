<?php
namespace App\Repositories;

use App\Models\Pertanyaan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

Class PertanyaanRepository{
    public $pertanyaan;

    public function __construct(
        Pertanyaan $pertanyaan
    )
    {
        $this->pertanyaan = $pertanyaan;
    }

    public function listPaginate(){
        $pertanyaan = $this->pertanyaan->cursorPaginate();

        return $pertanyaan;
    }

    public function getOne($id){
        $pertanyaan = $this->pertanyaan->find($id);

        return $pertanyaan;
    }

    public function store($request, $user){
        $data = $this->pertanyaan->create([
            'judul' => $request->judul,
            'body' => $request->body,
            'overview' => $request->overview,
            'quill_delta' => $request->quill_delta,
            'waktu_tanya' => Carbon::now()->toDateTimeString(),
            'kategori_id' => $request->kategori_id,
            'user_id' => $user->id,
        ]);

        return $data;
    }

    public function update($request,$pertanyaan){
        $pertanyaan->judul = $request->judul;
        $pertanyaan->body = $request->body;
        $pertanyaan->overview = $request->overview;
        $pertanyaan->quill_delta = $request->quill_delta;
        $pertanyaan->waktu_tanya = Carbon::now()->toDateTimeString();
        $pertanyaan->kategori_id = $request->kategori_id;
        
        $pertanyaan->save();
        return $pertanyaan;
    }
}