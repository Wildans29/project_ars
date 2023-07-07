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
        $data['pertanyaanId'] = 'G001';        
        return view('diagnosa/question', compact("data"));
    }
    
    public function executeQuestion($id, $pertanyaanId, $isTrue)
    {
        $diagnosa = Diagnosa::find($id);

        // Simpan jawaban kode gejala ke dalam kolom "gejala" pada tabel "diagnosa"
        if ($isTrue > 0) {
            $diagnosa->upsertGejala($id, $pertanyaanId);
            
            $nextQuestion = $pertanyaanId + 1;
            $data = Gejala::where('id', $nextQuestion)->first();

            // Periksa apakah masih ada pertanyaan berikutnya
            if ($data) {
                $data['diagnosaId'] = $id;
                $data['pertanyaanId'] = $data->id;
                return view('diagnosa.question', compact("data"));
                # code...
            } else {
                return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Result berhasil disimpan!']);
            }
  
        } else {
            $nextQuestion = $pertanyaanId + 1;
            $data = Gejala::where('id', $nextQuestion)->first();

            // Periksa apakah masih ada pertanyaan berikutnya
            if ($data) {
                $data['diagnosaId'] = $id;
                $data['pertanyaanId'] = $data->id;

                return view('diagnosa.question', compact("data"));
            } else {
                return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Result berhasil disimpan!']);
            }
        }
    }
       

    public function result($id)
    {

        $aturan = Aturan::select('kode_gejala')->get();
        $cariArray = [];
        
        foreach ($aturan as $row) {
            $cari = $row->kode_gejala;
        
            $diagnosa = Diagnosa::where('id', $id)->where('gejala', 'LIKE', '%' . $cari . '%')->get();
        
            foreach ($diagnosa as $item) {
                $cariArray[] = $cari;
            }
        }
        
        // Menampilkan nilai $cari yang sesuai
        $arrayHasil = array_unique($cariArray);

        if ($arrayHasil) {
            $data['hasil'] = Aturan::whereIn('kode_gejala', $arrayHasil)->get();
            return view('diagnosa/result', compact("data"));
        } else {
            return view('diagnosa/result-failed');
        }
        

        // $data = (new Diagnosa)->getResultDiagnosa($id);

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