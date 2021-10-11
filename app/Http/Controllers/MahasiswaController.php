<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function pilihKrs()
    {
        return 'Anda dapat memilih KRS';
    }

    public function tambahMahasiswa()
    {
        Mahasiswa::create([
            'nama' => 'wafi',
            'nim' => '195150701111014',
            'status_pembayaran' => false
        ]);
    }
    public function belumBayar()
    {
        $daftarMHS = Mahasiswa::where('status_pembayaran', false)->get();
        if(!$daftarMHS) {
            return response()->json([
                'message' => 'data not found',
            ], 404);
        }
        return response()->json($daftarMHS);
    }
    public function cekBayar()
    {
        $daftarMHS = Mahasiswa::where('status_pembayaran', true)->get();
        if(!$daftarMHS) {
            return response()->json([
                'message' => 'data not found',
            ], 404);
        }
        return response()->json($daftarMHS);
    }

    public function cekMahasiswa($nim)
    {
        $status = Mahasiswa::where('nim', $nim)->get('status_pembayaran');
        if(!$status) {
            return response()->json([
                'message' => 'data not found',
            ], 404);
        }
        return response()->json($status);
    }

    public function Krs(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'statusBayar' => 'required'
        ]);

        if($request['statusBayar'] == 0) {
            return response()->json([
                'message' => 'Harap Melakukan Pembayaran UKT Terlebih Dahulu'
            ], 200);
        }

        if($request['statusBayar'] == 1){
        return response()->json([
            'message' => 'Silahkan mengisi Kartu Rencana Studi',
        ], 200);

        if($request['statusBayar'] =! 1 && $request['statusBayar'] =! 0){
        return response()->json([
                'message' => 'Inputkan status pembayaran yang benar',
        ], 200);
        }

    }

    }


  
}