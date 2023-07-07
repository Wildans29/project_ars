@extends('layouts.master')

@section('title')
HASIL KONSULTASI
@endsection

@section('breadcrumb')
@parent
<li class="active">Hasil Konsultasi</li>
@endsection

@section('styles')
<style>
    .icon-wrapper {
        text-align: center;
        margin-bottom: 20px;
    }

    .icon-wrapper i {
        font-size: 50px;
        color: #337ab7;
    }

    .fade-in {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .fade-in.show {
        opacity: 1;
    }
</style>
@endsection

@section('content')
<!-- Default box -->
<div class="container-fluid">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Hasil konsultasi</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">

                    @foreach($data['hasil'] as $value)
                    <strong><i class="fa fa-pencil margin-r-5"></i> {{ $value->kerusakan->nama }}</strong> <br>
                    @endforeach
                    Solusi
                    <ul>
                        @foreach($data['hasil'] as $item)
                        <li>{{ $item->solusi }}</li>
                        @endforeach
                    </ul>

                    {{-- ada 2 tampilan, serah mau yg atas atau bawah --}}
                    {{-- @foreach($data['hasil'] as $item)
                    <strong><i class="fa fa-pencil margin-r-5"></i> {{ $item->kerusakan->nama }}</strong>
                    <ul>
                        <li>{{ $item->solusi }}</li>
                    </ul>
                    @endforeach --}}

                </div>
            </div>
        </div>
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
