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
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fade-in">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kerusakan</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['hasil'] as $value)
                                <tr>
                                    <td>{{ $value->kerusakan->nama }}</td>
                                    <td>{{ $value->solusi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
