@extends('layouts.master')

@section('pagetitle', 'Diagnosa')

@section('content')
    <section class="content-header">
        <h1>
            Diagnosa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $data->kerusakan->nama }}</h3>
            </div>
            <div class="box-body">
                {{ $data->pertanyaan }}
                <br>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('diagnosa.question', ["id" => $data->diagnosaId, "pertanyaanId" => $data->id, "isTrue" => 0]) }}" class="btn btn-danger">Tidak</a>
                <a href="{{ route('diagnosa.question', ["id" => $data->diagnosaId, "pertanyaanId" => $data->id, "isTrue" => 1]) }}" class="btn btn-success pull-right">Ya</a>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection
