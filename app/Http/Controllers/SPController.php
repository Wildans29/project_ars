<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SP;

class SPController extends Controller
{
    public function index()
    {
        return view('sistempakar.index');
    }
    public function submit(Request $request)
    {
        // Ambil nilai-nilai yang dikirimkan melalui formulir
        $motor = $request->input('motor');
    
        // Simpan data ke tabel booking
        $diagnosa = new Diagnosa();
        $diagnosa->motor = $motor;
        $diagnosa->save();

        // Redirect ke halaman berhasil
        return redirect()->route('sistempakar.hasil');
    }
    // public function show()
    // {
    //     return Setting::first();
    // }

    // public function update(Request $request)
    // {
    //     $setting = Setting::first();
    //     $setting->nama_perusahaan = $request->nama_perusahaan;
    //     $setting->telepon = $request->telepon;
    //     $setting->alamat = $request->alamat;
    //     $setting->diskon = $request->diskon;
    //     $setting->tipe_nota = $request->tipe_nota;

    //     if ($request->hasFile('path_logo')) {
    //         $file = $request->file('path_logo');
    //         $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('/img'), $nama);

    //         $setting->path_logo = "/img/$nama";
    //     }

    //     $setting->update();

    //     return response()->json('Data berhasil disimpan', 200);
    // }
}
