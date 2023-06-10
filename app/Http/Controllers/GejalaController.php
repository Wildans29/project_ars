<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all(); // Mengambil semua data gejala dari model
    
        return view('master.gejala.index', compact('gejala'));
    }
    
    public function search()
    {
        try {
            return datatables()->of(Gejala::all())->toJson();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
    
    public function create()
    {
        // Tampilkan formulir untuk menambah gejala
        return view('master.gejala.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'id' => 'required',
            'bila_benar' => 'required',
            'kode_kerusakan' => 'required',
            'pertanyaan' => 'required',
            'bila_salah' => 'required',
            'solusi' => 'required',
        ]);

        // Buat objek Gejala baru
        $gejalaBaru = new Gejala;
        $gejalaBaru->id = $request->input('id'); // Menggunakan id yang diinputkan
        $gejalaBaru->bila_benar = $request->input('bila_benar');
        $gejalaBaru->kode_kerusakan = $request->input('kode_kerusakan');
        $gejalaBaru->pertanyaan = $request->input('pertanyaan');
        $gejalaBaru->bila_salah = $request->input('bila_salah');
        $gejalaBaru->solusi = $request->input('solusi');
        $gejalaBaru->save();

        // Redirect ke halaman index gejala
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Ambil data gejala berdasarkan ID
        $gejala = Gejala::find($id);

        // Tampilkan formulir untuk mengedit gejala
        return view('master.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        try {
        // Validasi inputan
        $validatedData = $request->validate([
            'id' => 'required',
            'bila_benar' => 'required',
            'kode_kerusakan' => 'required',
            'pertanyaan' => 'required',
            'bila_salah' => 'required',
            'solusi' => 'required',
        ]);

        // Update data gejala berdasarkan ID
        $gejala = Gejala::find($id);
        $gejala->update($validatedData);
    } catch (\Exception $e) {
        // Tampilkan pesan error
        dd($e->getMessage());
    }

        // Redirect ke halaman index gejala
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data gejala berdasarkan ID
        $gejala = Gejala::find($id);
        $gejala->delete();

        // Redirect ke halaman index gejala
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
}
