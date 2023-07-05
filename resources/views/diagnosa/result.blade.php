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
                    <div class="icon-wrapper fade-in">
                        <i class="fa fa-wrench"></i>
                    </div>
                    <div class="alert alert-success fade-in">
                        <h4>Penyebab Kerusakan:</h4>
                        <ul>
                            @foreach($data['kerusakan'] as $key => $value)
                            <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="icon-wrapper fade-in">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <div class="alert alert-info fade-in">
                        <h4>Solusi:</h4>
                        <ul>
                            @foreach($data['solusi'] as $row => $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ url('diagnosa/createNew') }}" class="btn btn-success pull-right">Diagnosa Baru ?</a>
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
