<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * Login Akun
     */
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string',
        ]);
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('dashboard')->with('info','login Success');
            }
     
            return back()->withErrors([
                'password' => 'Password Tidak Cocok Dengan Email',
            ])->onlyInput('email');
        } catch (\Throwable $th) {
            return back()->withErrors(['error'=>$th->getMessage()]);
            // return response()->json([
            //     'message' => 'Failed',
            //     'error' => $th->getMessage(),
            // ],500);
        }
        
    }

    /**
     * Daftar Akun
     */
    public function register(Request $request){
        $requestVali = $request->validate([
            'nama' => 'required|string|min:3',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'tgl_lahir' => 'nullable|date',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
        ]);
        try {
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
            return redirect('/login')->with('info','Sukses Mendaftar, Silahkan Login');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back(500)->with('error',$th->getMessage());
            // return response()->json([
            //     'message' => 'Failed',
            //     'error' => $th->getMessage(),
            // ],500);
        }
    }

    /**
     * Logout
     */
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('info','Terima Kasih telah menggunakan layanan kami');
    }
}
