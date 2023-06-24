@extends('layouts.master')

@section('title')
    Riwayat Konsultasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Riwayat Konsultasi</li>
@endsection

@section('content')
<<<<<<< HEAD

    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">History Diagnosa</h3>
        </div>
        <div class="box-body">
            @if (count($diagnosa) > 0)
                <table class="table table-responsive table-condensed table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Motor</th>
                            <th>Tanggal Konsultasi</th>
                            <th>Gejala dan Hasil Konsultasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diagnosa as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->motor }}</td>
                                <td>{{ $item->tgl_konsultasi }}</td>
                                <td>
                                    <a href="{{ route('diagnosa.result', ['id' => $item->user_id]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada riwayat konsultasi.</p>
            @endif
        </div>
=======
    <div class="container">
        <h2>Riwayat Konsultasi</h2>

        @if ($riwayatKonsultasi->isEmpty())
            <p>Belum ada riwayat konsultasi.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Hasil Konsultasi</th>
                        <th scope="col">Waktu Konsultasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayatKonsultasi as $index => $konsultasi)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $konsultasi->hasil_konsultasi }}</td>
                            <td>{{ $konsultasi->waktu_konsultasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
    </div>
@endsection
