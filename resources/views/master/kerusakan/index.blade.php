@extends('layouts.master')
@section('breadcrumb')
    @parent
    <li class="active">kerusakan</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                </div>
            </div>
            <div class="box-body">
                <table id="kerusakan-table" class="table table-responsive table-condensed table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kerusakan as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script type="text/javascript">
        $(function () {
            $('#kerusakan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kerusakan.search') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'kode', name: 'kode' },
                    { data: 'nama', name: 'nama' }
                ]
            });
        });
    </script>
@endsection
