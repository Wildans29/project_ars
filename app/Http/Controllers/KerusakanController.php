<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerusakan;

class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.kerusakan.index');
    }

    public function data()
    {
        $kerusakan = Kerusakan::orderBy('kode_kerusakan', 'asc')->get();

        return datatables()
            ->of($kerusakan)
            ->addIndexColumn()
            ->addColumn('kode_kerusakan', function ($kerusakan) {
                return '<span class="label label-success">'. $kerusakan->kode_kerusakan .'</span>';
            })
            ->addColumn('nama', function ($kerusakan) {
                return $kerusakan->nama;
            })
            ->addColumn('aksi', function ($kerusakan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('kerusakan.edit', $kerusakan->id) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('kerusakan.destroy', $kerusakan->id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $kerusakan = Kerusakan::create($request->all());

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
        $kerusakan = Kerusakan::find($id);

        return response()->json($kerusakan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);

        return response()->json($kerusakan);
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
        $kerusakan = Kerusakan::find($id);
        $kerusakan->fill($request->all())->save();

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
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}
