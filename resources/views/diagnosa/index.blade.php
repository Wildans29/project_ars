@extends('layouts.master')

@section('title')
    Halaman Konsultasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Konsultasi</li>
@endsection

@section('content')
    <div class="container-fluid text-center">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">KONSULTASI KERUSAKAN MOTOR</h3>
            </div>
            <div class="box-body">
                <p>Klik mulai untuk melakukan konsultasi kerusakan Motor Anda!</p>
                <a href="{{ route('diagnosa.create') }}" class="btn btn-success">Mulai</a>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.box -->
@endsection
