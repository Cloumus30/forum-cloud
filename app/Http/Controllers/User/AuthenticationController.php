<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request){
        try {
            $request->validate([
                'nama' => 'required|string|min:3',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string',
                'tgl_lahir' => 'nullable|date',
                'umur' => 'nullable|integer',
                'alamat' => 'nullable|string',
            ]);

            DB::beginTransaction();
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tgl_lahir' => $request->tgl_lahir,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
            ]);
            DB::commit();
            return view('login')->with('status','success register, please login');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed',
                'error' => $th->getMessage(),
            ],500);
        }
    }
}
