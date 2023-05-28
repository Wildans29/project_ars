<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view ('pelanggan.riwayatKonsultasi');
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
