<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PakarController extends Controller
{
    public function proses(Request $request)
    {
        // Logika pemrosesan data konsultasi
        
        // Contoh logika sederhana untuk mendapatkan gejala yang dipilih
        $gejala = $request->input('gejala');
        
        // Lakukan pemrosesan sesuai dengan kebutuhan Anda
        
        // Tampilkan hasil konsultasi
        return view('hasil_konsultasi', compact('hasil'));
    }
}
