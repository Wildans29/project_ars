@extends('layouts.master')

@section('pagetitle')
    Mulai Diagnosa
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Mulai Diagnosa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Diagnosa</a></li>
            <li class="active">Start</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <form action="{{route('diagnosa.store')}}" method="post" role="form"
                      class="form-horizontal form-groups-bordered" enctype="multipart/form-data" id="form-ski">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-2 col-form-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="nama"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-form-label">Motor</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="motor" id="motor" placeholder="nama / jenis motor"
                                           required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('diagnosa') }}" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    <button type="submit" class="btn btn-success" id="btnSave"><i
                        class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
{{-- @section('js')
    <script>
        function confirmAndSubmit() {
            var form = $("#form-ski")[0];
            var valid = window.confirm("Apakah Anda Yakin nama dan motor sudah benar?");

            if (valid)
                return form.submit();

            return false;
        }
    </script>
@endsection --}}
