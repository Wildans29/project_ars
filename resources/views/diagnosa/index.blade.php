@extends('layouts.app')

@section('pagetitle', 'Mulai Diagnosa')

@section('content')
    <section class="content-header">
        <h1>
            Diagnosa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Diagnosa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Sistem Diagnosa</h3>
            </div>
            <div class="box-body">
                <a href="{{ route('diagnosa.create') }}" class="btn btn-success">Mulai</a> Diagnosa kerusakan Motor Anda!
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">History Diagnosa</h3>
            </div>
            <div class="box-body">
                <table id="diagnosa-table" class="table table-responsive table-condensed table-bordered"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Motor</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script type="text/javascript">
        $(function () {
            var table = $('#diagnosa-table').DataTable({
                sorting: false,
                iDisplayLength: 25,
                language: {
                    infoFiltered: ""
                },
                columns: [
                    {
                        searchable: false,
                        sortable: false,
                        data: null,
                        name: null,
                        render: function(data, type, row, meta){
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        sortable: false,
                        data: "nama"
                    },
                    {
                        sortable: false,
                        data: "motor"
                    },
                    {
                        data: null,
                        name: null,
                        sortable: false,
                        render: function(data, type, row, meta){
                            var view = '{{ route("diagnosa.result", ":id") }}';
                            view = view.replace(':id', row.id);
                            return `<a href="${view}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>`;
                        }
                    },
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('diagnosa.search') }}",
                }
            });
        } );
    </script>
@endsection
