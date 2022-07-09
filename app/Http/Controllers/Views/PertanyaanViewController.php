<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanViewController extends Controller
{
    /**
     * View Question
     */
    public function view(Request $request,$id){
        try {
            $pertanyaan = Pertanyaan::find($id);
            return view('Pertanyaan',['pertanyaan' => $pertanyaan]);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
