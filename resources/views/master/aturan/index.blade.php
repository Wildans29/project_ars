@extends('layouts.master')

@section('title')
    Daftar Aturan
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Aturan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('aturan.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode Kerusakan</th>
                            <th>Kode Gejala</th>
                            <th>Solusi</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('master.aturan.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
        processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('aturan.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_kerusakan'},
                {data: 'kode_gejala'},
                {data: 'solusi'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                .done((response) => {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Aturan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=kode_kerusakan]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Aturan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');

        $.get(url)
            .done(function(response) {
                $('#modal-form [name=kode_kerusakan]').val(response.kode_kerusakan);
                $('#modal-form [name=kode_gejala]').val(response.kode_gejala);
                $('#modal-form [name=solusi]').val(response.solusi);
            })
            .fail(function(errors) {
                alert('Tidak dapat menampilkan data');
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(response) {
                    table.ajax.reload();
                },
                error: function(errors) {
                    alert('Tidak dapat menghapus data');
                }
            });
        }
    }
</script>
@endpush
