<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;

class AdminController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json($mahasiswas);
    }
}
