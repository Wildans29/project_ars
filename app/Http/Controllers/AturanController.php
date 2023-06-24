<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;


class AturanController extends Controller
{
    public function executeQuestion($id, $pertanyaanId, $isTrue)
    {
        // Simpan jawaban kode gejala ke dalam kolom "gejala" pada tabel "diagnosa"
        (new Diagnosa())->upsertGejala($id, $pertanyaanId);

        // Ambil data diagnosa berdasarkan ID
        $diagnosa = Diagnosa::find($id);

        // Ambil kode gejala yang disimpan dalam kolom "gejala" pada tabel "diagnosa"
        $gejala = $diagnosa->gejala;

        // Cari aturan yang sesuai berdasarkan kode gejala
        $aturan = Aturan::where('kode_gejala', $gejala)->first();

        if ($aturan) {
            // Ambil pertanyaan berikutnya berdasarkan aturan yang sesuai
            $nextPertanyaanId = $aturan->gejala->kode_gejala;

            if ($nextPertanyaanId) {
                $data = Gejala::where('kode_gejala', $nextPertanyaanId)->first();

                $data["diagnosaId"] = $id;
                return view('diagnosa/question', compact("data"));
            }
        }

        // Jika tidak ada pertanyaan berikutnya, cocokkan gejala dengan aturan untuk mendapatkan jenis kerusakan
        $jenisKerusakan = $aturan->kerusakan->nama;

        // Redirect ke halaman hasil dengan menampilkan jenis kerusakan
        return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Jenis Kerusakan: ' . $jenisKerusakan]);
    }

    public function show($id)
    {
        $aturan = Aturan::findOrFail($id);
        return view('aturan.show', compact('aturan'));
    }

    public function create()
    {
        $gejala = Gejala::all();
        $kerusakan = Kerusakan::all();
        return view('aturan.create', compact('gejala', 'kerusakan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kerusakan' => 'required',
            'kode_gejala' => 'required',
        ]);

        Aturan::create($request->all());

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);
        $gejala = Gejala::all();
        $kerusakan = Kerusakan::all();
        return view('aturan.edit', compact('aturan', 'gejala', 'kerusakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kerusakan' => 'required',
            'kode_gejala' => 'required',
        ]);

        $aturan = Aturan::findOrFail($id);
        $aturan->update($request->all());

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $aturan = Aturan::findOrFail($id);
        $aturan->delete();

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil dihapus!');
    }

    public function index()
    {
        $aturan = Aturan::all();
        return view('aturan.index', compact('aturan'));
    }
}
