@extends('layouts.master')

@section('title', 'Tambah Gejala')

@section('content')
    <div class="container-fluid">
        <h1>Tambah Gejala</h1>
        <form action="{{ route('gejala.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">kode kerusakan:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">Nilai Benar:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">Nilai Salah:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">Pertanyaan:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="deskripsi">Solusi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
