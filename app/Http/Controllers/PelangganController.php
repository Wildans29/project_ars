<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Diagnosa;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\riwayatKonsultasi;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Kerusakan;
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function status()
    {
<<<<<<< HEAD
        return view('pelanggan.status');
    }

    public function riwayat()
    {
        $userId = auth()->user()->id;
        $diagnosa = Diagnosa::where('user_id', $userId)->get();

        return view('pelanggan.riwayatKonsultasi', compact('diagnosa'));
    }

    public function konsultasi()
    {
        return view('diagnosa.create');
=======
        return view ('pelanggan.status');
    }

    public function riwayatKonsultasi()
    {
    $riwayatKonsultasi = RiwayatKonsultasi::where('user_id', auth()->user()->id)->get();
    
    return view('pelanggan.riwayatKonsultasi', compact('riwayatKonsultasi'));
    }

    public function konsultasi()
    { 
        return view ('diagnosa.index');      
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
    }

    public function berhasil()
    {
<<<<<<< HEAD
        return view('pelanggan.berhasil');
=======
        return view ('pelanggan.berhasil');
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
    }
}
