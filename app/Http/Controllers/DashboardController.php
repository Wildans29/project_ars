<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $kategori = Kategori::count();
    $produk = Produk::count();
    $supplier = Supplier::count();

    
    $tanggal_awal = date('Y-m-01');
    $tanggal_akhir = date('Y-m-d');

    $data_tanggal = array();
    $data_pendapatan = array();

    while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
        $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

        $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
        $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
        $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

        $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
        $data_pendapatan[] += $pendapatan;

        $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
    }

    if (auth()->user()->level == 1) {
        return view('admin.dashboard', compact('kategori', 'produk', 'supplier' , 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
    } elseif (auth()->user()->level == 2) {
            // Pengguna dengan level 2 (pelanggan) diarahkan ke dashboard pelanggan
            return view('pelanggan.dashboard');
        } else {
            // Level pengguna yang lain dapat diarahkan ke halaman yang sesuai
            return view('dashboard');
        }
}
}
