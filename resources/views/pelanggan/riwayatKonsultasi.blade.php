@extends('layouts.master')

@section('title')
    Riwayat Konsultasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Riwayat Konsultasi</li>
@endsection

@section('content')
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
    </div>
@endsection
