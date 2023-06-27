<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.gejala.index');
    }

    public function data()
    {
        $gejala = Gejala::orderBy('kode_gejala', 'asc')->get();

        return datatables()
            ->of($gejala)
            ->addIndexColumn()
            ->addColumn('kode_gejala', function ($gejala) {
                return '<span class="label label-success">' . $gejala->kode_gejala . '</span>';
            })
            ->addColumn('pertanyaan', function ($gejala) {
                return $gejala->pertanyaan;
            })
            ->addColumn('aksi', function ($gejala) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('gejala.edit', $gejala->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('gejala.destroy', $gejala->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_gejala'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gejala = Gejala::create($request->all());

        return response()->json(null, 204);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gejala = Gejala::find($id);

        return response()->json($gejala);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);

        return response()->json($gejala);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gejala = Gejala::find($id);
        $gejala->fill($request->only(['kode_gejala', 'pertanyaan']))->save();

        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}
