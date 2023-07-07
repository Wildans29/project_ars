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


{{-- @extends('layouts.master')

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
            <div class="box-header with-border">
                <h3 class="box-title">Hasil konsultasi</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($data['kerusakan'] as $key => $value)
                            @if(isset($value['kode']) && in_array($value['kode'], $data['kode']))
                                <strong><i class="fa fa-pencil margin-r-5"></i> {{ $value['nama'] }}</strong>
<ul>
    @foreach($data['gejala'] as $row => $item)
    @if(isset($item['kode']) && $value['kode'] == $item['kode'])
    <li>{{ $item['solusi'] }}</li>
    @endif
    @endforeach
</ul>
@endif
@endforeach
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
@endsection --}}
