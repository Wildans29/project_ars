@extends('layouts.master')

@section('title')
HASIL KONSULTASI
@endsection

@section('breadcrumb')
@parent
<li class="active">Hasil Konsultasi</li>
@endsection

@section('content')
<!-- Default box -->
<div class="container-fluid">
    <div class="box">

        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fade-in">
                        <p class="emoticon">&#128577;</p>
                        <p>Mohon maaf, untuk saat sistem tidak dapat mendeteksi kerusakan motor berdasarkan gejala yang ada berikan.</p>
                        <p>Silakan coba lagi atau hubungi mekanik kami pada nomor berikut : <a href="https://wa.me/6282328010288">082328010288</a></p>
                       
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ url('diagnosa/createNew') }}" class="btn btn-success pull-right">Diagnosa Baru</a>
        </div>
        <!-- /.box-footer-->
    </div>
</div>
<!-- /.box -->
@endsection

@section('scripts')
<script>
    // Add fade-in effect after the content is loaded
    document.addEventListener("DOMContentLoaded", function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        fadeElements.forEach(element => {
            element.classList.add('show');
        });
    });
</script>
@endsection
