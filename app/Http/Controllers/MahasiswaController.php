<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\Hash;


class MahasiswaController extends Controller
{
    public function home(){
        return view('pccsyk.index');
    }

    public function register(Request $request){

        // //Validasi
        // $request->validate([
        //     'nama' => 'required',
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }

    public function login(Request $request){

        $mahasiswa_db = Mahasiswa::select('email','password')->where('email', $request->email)->first();
        
        // Cek Email dan Password 
        if ($mahasiswa_db) // Cek Email di database
        { // jika email terdaftar
            if (Hash::check($request->password, $mahasiswa_db->password)) // Cek Hash Password di database dan yang diinputkan
            { // jika password sesuai
                return 'anda berhasil login';
            }
            else 
            { // Jika password tidak sesuai
                return 'password tidak sesuai';
            }
        }
        else 
        { // Jika email tidak terdaftar
            return 'email tidak sesuai';
        }
        
    }

}
