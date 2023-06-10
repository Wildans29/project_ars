<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Kerusakan;
use Illuminate\Support\Facades\DB;

class KerusakanController extends Controller
{
    public function index()
{
    $kerusakan = Kerusakan::all(); // Mengambil semua data kerusakan dari model

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
}
