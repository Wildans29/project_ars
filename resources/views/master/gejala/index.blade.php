
@extends('layouts.master')

@section('breadcrumb')
    @parent
    <li class="active">Gejala</li>
@endsection

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                </div>
            </div>
            <div class="box-body">
                <table class="table table-responsive table-condensed table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode_gejala</th>
                            <th>Pertanyaan</th>
                            {{-- <th>Solusi</th> --}}
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kode_gejala }}</td>
                                <td>{{ $item->pertanyaan }}</td>
                                {{-- <td>{{ $item->solusi }}</td> --}}
                                <td>
                                    <a href="{{ route('gejala.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('gejala.destroy', $item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url('/master/gejala/create') }}" class="btn btn-success">Tambah Gejala</a>
            </div>
        </div>
    </section>
@endsection
