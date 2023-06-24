<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;
use Illuminate\Support\Facades\DB;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakan = Kerusakan::all();

        return view('master.kerusakan.index', compact('kerusakan'));
    }

    public function search()
    {
        try {
            return datatables()->of(DB::table('kerusakan')->orderBy('kode')->get())->toJson();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
    
    public function create()
    {
        return view('master.kerusakan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $kerusakanBaru = new Kerusakan;
        $kerusakanBaru->kode = $request->input('kode');
        $kerusakanBaru->nama = $request->input('nama');
        $kerusakanBaru->deskripsi = $request->input('deskripsi');
        $kerusakanBaru->save();

        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kerusakan = Kerusakan::find($id);

        return view('master.kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
            ]);

            $kerusakan = Kerusakan::find($id);
            $kerusakan->update([
                'kode' => $request->input('kode'),
                'nama' => $request->input('nama'),
                'deskripsi' => $request->input('deskripsi'),
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kerusakan = Kerusakan::find($id);
        $kerusakan->delete();

        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil dihapus');
    }
}
