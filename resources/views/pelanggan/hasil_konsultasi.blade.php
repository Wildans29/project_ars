@extends('layouts.master')

@section('title')
    Hasil Konsultasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Hasil Konsultasi</li>
@endsection

@section('content')
<div class="container">
    <div class="hasil-konsultasi">
        <h3 class="hasil-konsultasi-title">Hasil Konsultasi</h3>
        <p class="hasil-konsultasi-text">Berikut adalah hasil konsultasi sistem pakar:</p>
        <div class="hasil-konsultasi-details">
            <div class="hasil-konsultasi-info">
                <span class="hasil-konsultasi-label">Kerusakan:</span>
                <span class="hasil-konsultasi-value">{{ $hasil }}</span>
            </div>
            <!-- Tambahkan informasi hasil konsultasi lainnya sesuai kebutuhan -->
        </div>
    </div>
</div>
@endsection
