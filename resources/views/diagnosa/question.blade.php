@extends('layouts.master')

@section('title')
    HALAMAN KONSULTASI
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Konsultasi gejala</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $data->nama}}</h3>
        </div>
        <div class="box-body">
            {{ $data->pertanyaan }}
            <br>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('diagnosa.question', ['id' => $data->diagnosaId, 'pertanyaanId' => $data->kode_gejala, 'isTrue' => 0]) }}" class="btn btn-danger">Tidak</a>
            <a href="{{ route('diagnosa.question', ['id' => $data->diagnosaId, 'pertanyaanId' => $data->kode_gejala, 'isTrue' => 1]) }}" class="btn btn-success">Ya</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
