<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
    
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
        return view('master.gejala.create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gejala = Gejala::find($id);

        return view('master.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        try {
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

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy($id)
    {
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
}
