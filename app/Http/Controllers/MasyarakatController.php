<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    function index(){
        $judul ="selamat datang di masyarakat";

        $masyarakat = DB::table('masyarakat')->get();
        return view('masyarakat',['TextJudul' =>  $judul, 'masyarakat' => $masyarakat]);
    }

    function tampil_masyarakat(){
        $judul = "selamat datang masyarakat";

        return view('isi-masyarakat',['TextJudul' =>  $judul,]);
    }
    function proses_tambah_masyarakat(Request $request){
        $request->validate([
            'nik' => 'required|min:1'
        ]);
        $nama = $request -> nama;
        $username = $request -> username;
        $password = $request -> password;
        $telp = $request -> telepon;

        DB::table('masyarakat')->insert([
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'telepon' => $telp
        ]);

        return redirect('/masyarakat');
    }
}