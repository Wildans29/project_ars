<?php

namespace App\Http\Controllers;

use App\models\Gejala;
use App\models\Diagnosa;
use App\models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DiagnosaController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('diagnosa/index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // public function create()
    // {
    //     return view('diagnosa/create');
    // }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'motor' => 'required',
        ]);
        // return $request;

        try {
            $data = [
                "nama" => $request->nama,
                "motor" => $request->motor
            ];
            $insertedId = DB::table("diagnosa")->insertGetId($data);

            return redirect()->route('diagnosa.first', ['id' => $insertedId])->with(['success' => 'Data berhasil disimpan!']);
        } catch (\Exception $e) {
            return redirect()->route('diagnosa.create')->with(['success' => $e->getMessage()]);
        }
    }

    public function firstQuestion()
    {
        $data = Gejala::where('is_first', 1)->first();
        $data["diagnosaId"] = Auth::user()->id;
        // return $data;
        return view('diagnosa/question', compact("data"));
    }

    /**
     * @param $id
     * @param $pertanyaanId
     * @param $isTrue
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function executeQuestion($id, $pertanyaanId, $isTrue)
    {
        $data = [];
        $item = Gejala::where('id', $pertanyaanId)->first();
        if ($isTrue > 0) {
            if ((new Diagnosa())->upsertGejala($id, $pertanyaanId)) {
                // Cek bila benar lebih dari 0 , karena kalau bila benar == 0 itu selesai
                if ($item->bila_benar > 0) {
                    // ambil data pertanyaan gejala bila benar
                    $data = Gejala::where('id', $item->bila_benar)->first();
                } else { // bila == 0 itu selesai
                    return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Result berhasil disimpan!']);
                }
            } else $data = $item;
        } else {
            if ($item->bila_salah > 0) {
                $data = Gejala::where('id', $item->bila_salah)->first();
            } else {
                return redirect()->route('diagnosa.result', ['id' => $id])->with(['success' => 'Result berhasil disimpan!']);
            }
        }
        $data["diagnosaId"] = $id;
        return view('diagnosa/question', compact("data"));
    }

    public function result($id)
    {
        $data = (new Diagnosa)->getResultDiagnosa($id);
        return view('diagnosa/result', compact("data"));
    }

    /**
     * @return mixed
     */
    public function search()
    {
        try {
            return datatables()->of(Diagnosa::all())->toJson();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
