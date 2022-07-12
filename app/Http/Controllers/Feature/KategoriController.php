<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Tambah Data Kategori
     */
    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|min:3',
            'deskripsi' => 'required|string',
        ]);
        try {
            $user = auth()->user();
            $request->merge(['user_id' => $user->id]);
            $kategori = Kategori::create($request->all());
            return redirect('/list-kategori')->with('info','Sukses tambah kategori');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }

    /**
     * Update Data Kategori
     */
    public function update(Request $request, $id){
        $request->merge(['id' => $id]);
        $request->validate([
            'id' => 'required|exists:kategoris,id',
            'nama' => 'required|string|min:3',
            'deskripsi' => 'required|string',
        ]);
        try {
            $kategori = Kategori::find($id);
            $kategori->update($request->all());
            return redirect('/list-kategori')->with('info','Sukses Update Kategori');
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
