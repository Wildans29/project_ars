<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayatKonsultasi;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Kerusakan;



class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function status()
    {
        return view ('pelanggan.status');
    }

    public function riwayatKonsultasi()
{
    $riwayatKonsultasi = RiwayatKonsultasi::where('user_id', auth()->user()->id)->get();
    
    return view('pelanggan.riwayatKonsultasi', compact('riwayatKonsultasi'));
}


    public function konsultasi()
    {
        
        return view ('pelanggan.konsultasi');  
         
    }

    public function berhasil()
    {
        return view ('pelanggan.berhasil');
    }
}
