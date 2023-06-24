<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;
=======
use App\Models\Gejala;
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $gejala = Gejala::all();
=======
        $gejala = Gejala::all(); // Mengambil semua data gejala dari model
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
    
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
<<<<<<< HEAD
=======
        // Tampilkan formulir untuk menambah gejala
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
        return view('master.gejala.create');
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $validatedData = $request->validate([
            'id' => 'required',
            'pertanyaan' => 'required',
            'solusi' => 'required',
            'is_first' => 'required',
        ]);

        $gejalaBaru = new Gejala;
        $gejalaBaru->id = $request->input('id');
        $gejalaBaru->pertanyaan = $request->input('pertanyaan');
        $gejalaBaru->solusi = $request->input('solusi');
        $gejalaBaru->is_first = $request->input('is_first') ? 1 : 0;
        $gejalaBaru->save();

=======
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
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $gejala = Gejala::find($id);

=======
        // Ambil data gejala berdasarkan ID
        $gejala = Gejala::find($id);

        // Tampilkan formulir untuk mengedit gejala
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
        return view('master.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        try {
<<<<<<< HEAD
            $validatedData = $request->validate([
                'id' => 'required',
                'pertanyaan' => 'required',
                'solusi' => 'required',
                'is_first' => 'required',
            ]);

            $gejala = Gejala::find($id);
            $gejala->update([
                'id' => $request->input('id'),
                'pertanyaan' => $request->input('pertanyaan'),
                'solusi' => $request->input('solusi'),
                'is_first' => $request->input('is_first') ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

=======
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
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy($id)
    {
<<<<<<< HEAD
        $gejala = Gejala::find($id);
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
    
    public function upsertGejala($pertanyaanId)
    {
        $diagnosa = Diagnosa::find(session('diagnosaId'));
        $gejala = Gejala::find($pertanyaanId);

        if (!$diagnosa || !$gejala) {
            return false;
        }

        $diagnosa->gejala()->syncWithoutDetaching([$gejala->id => ['jawaban' => true]]);
        
        return true;
    }
=======
        // Hapus data gejala berdasarkan ID
        $gejala = Gejala::find($id);
        $gejala->delete();

        // Redirect ke halaman index gejala
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
}
