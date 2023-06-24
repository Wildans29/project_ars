<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function status()
    {
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
    }

    public function berhasil()
    {
        return view('pelanggan.berhasil');
    }
}
