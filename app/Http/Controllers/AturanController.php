<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aturan;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.aturan.index');
    }

    public function data()
    {
        $aturan = Aturan::orderBy('kode_kerusakan', 'asc')->get();

        return datatables()
            ->of($aturan)
            ->addIndexColumn()
            ->addColumn('kode_kerusakan', function ($aturan) {
                return '<span class="label label-success">' . $aturan->kode_kerusakan . '</span>';
            })
            ->addColumn('kode_gejala', function ($aturan) {
                return $aturan->kode_gejala;
            })
            ->addColumn('solusi', function ($aturan) {
                return $aturan->solusi;
            })
            ->addColumn('aksi', function ($aturan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('aturan.edit', $aturan->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('aturan.destroy', $aturan->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_kerusakan'])
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
        $aturan = Aturan::create($request->all());

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
        $aturan = Aturan::find($id);

        return response()->json($aturan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);

        return response()->json($aturan);
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
        $aturan = Aturan::find($id);
        $aturan->fill($request->all())->save();

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
        $aturan = Aturan::findOrFail($id);
        $aturan->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}