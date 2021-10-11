<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Matkul;

class AkademikController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all();
        return response()->json($matkuls);
    }
    public function getKrs(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nim',$request->nim)->first();
        if(!empty($mahasiswa)){
            if ($mahasiswa->status_pembayaran == "Belum Terbayar") {
                return response()->json(["message" => "Tidak Bisa Mengikuti Krs"]);}
            else {$matkuls = Matkul::all();
                return response()->json(["message" => "Bisa Mengikuti Krs", "matkul" => $matkuls]);}
        }
    }
    public function createKrs(Request $request)
    {
        return response()->json(["message" => "Berhasil Mengikuti Krs", "daftar matkul" => $request->all()]);
    }
}