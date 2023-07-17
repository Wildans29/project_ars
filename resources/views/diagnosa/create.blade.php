@extends('layouts.master')

@section('title')
    Mulai Diagnosa
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Mulai Diagnosa</li>
@endsection

@section('content')
        <!-- Default box -->
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <form action="{{ route('diagnosa.store') }}" method="post" role="form"
                      class="form-horizontal form-groups-bordered" enctype="multipart/form-data" id="form-ski">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-2 col-form-label">Motor</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="motor" id="motor" placeholder="nama / jenis motor"
                                           required/>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('dashboard') }}" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    <button type="submit" class="btn btn-success" id="btnSave" onclick="return confirmAndSubmit();"><i
                        class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function confirmAndSubmit() {
            var form = $("#form-ski")[0];
            var valid = window.confirm("Apakah Anda yakin motor sudah benar?");

            if (valid)
                return form.submit();

            return false;
        }
    </script>
@endsection
