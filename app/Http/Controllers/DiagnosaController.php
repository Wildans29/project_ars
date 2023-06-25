<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class DiagnosaController extends Controller
{
    public function index()
    {
        return view('diagnosa/index');
    }

    public function create()
    {
        return view('diagnosa/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'motor' => 'required',
        ]);

        try {
            $data = [
                "user_id" => $request->user_id,
                "motor" => $request->motor,
                "tgl_konsultasi" => Carbon::now(),
            ];
            $insertedId = DB::table("diagnosa")->insertGetId($data);

            return redirect()->route('diagnosa.first', ['id' => $insertedId])->with(['success' => 'Data berhasil disimpan!']);
        } catch (\Exception $e) {
            return redirect()->route('diagnosa.create')->with(['success' => $e->getMessage()]);
        }
    }

    public function firstQuestion($id)
    {
        $data = Gejala::where('is_first', true)->first();
        $data["diagnosaId"] = $id;

        // return $data;
        
        return view('diagnosa/question', compact("data"));
    }
    
    public function executeQuestion($id, $pertanyaanId, $isTrue)
    {
        // Simpan jawaban kode gejala ke dalam kolom "gejala" pada tabel "diagnosa"
        $diagnosa = Diagnosa::find($id);
        
        if ($isTrue > 0) {
            $diagnosa->upsertGejala($pertanyaanId);
            
            // return
            $nextGejala = $diagnosa->getNextGejala();

            return redirect()->route('diagnosa.question', [
                'id' => $id,
                'pertanyaanId' => $nextGejala->kode_gejala,
                'isTrue' => $isTrue
            ]);
  
        } else {
           
            return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Result berhasil disimpan!']);
        }
    
       // Periksa apakah masih ada pertanyaan berikutnya
       
        if ($nextGejala) {
            // Lanjutkan ke pertanyaan berikutnya
            return redirect()->route('diagnosa.question', [
                'id' => $id,
                'pertanyaanId' => $nextGejala->id,
                'isTrue' => $isTrue
            ]);
        } else {
            // Tampilkan halaman hasil diagnosa
            return redirect()->route('diagnosa.result', ['id' => $id]);
        }
    }
       

    public function result($id)
    {
        $data = (new Diagnosa)->getResultDiagnosa($id);
        return view('diagnosa/result', compact("data"));
    }

    public function search()
    {
        try {
            return datatables()->of(Diagnosa::all())->toJson();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}