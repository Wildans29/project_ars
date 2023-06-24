<?php

<<<<<<< HEAD
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;
=======

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Kerusakan;
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
use Illuminate\Support\Facades\DB;

class KerusakanController extends Controller
{
    public function index()
<<<<<<< HEAD
    {
        $kerusakan = Kerusakan::all();

        return view('master.kerusakan.index', compact('kerusakan'));
    }
=======
{
    $kerusakan = Kerusakan::all(); // Mengambil semua data kerusakan dari model

    return view('master.kerusakan.index', compact('kerusakan'));
}

>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271

    public function search()
    {
        try {
            return datatables()->of(DB::table('kerusakan')->orderBy('kode')->get())->toJson();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
<<<<<<< HEAD
    
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
=======
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
}
