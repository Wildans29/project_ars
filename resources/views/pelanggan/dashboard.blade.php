@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body text-center">
                <h1>Selamat Datang</h1>
                <h2>Silahkan lakukan booking Service atau gunakan fitur diagnosis kerusakan pada motor anda.</h2>
                <br><br>
                <a href="{{ route('booking.index') }}" class="btn btn-success btn-lg">Booking Service</a>
                <a href="{{ url('pelanggan/konsultasi') }}" class="btn btn-success btn-lg">Konsultasi</a>
            </div>
        </div>
    </div>
</div>

@endsection