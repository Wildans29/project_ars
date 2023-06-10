@extends('layouts.master')

@section('title')
    Konsultasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Konsultasi kerusakan</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Konsultasi Kerusakan</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('konsultasi.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="motor">Pilihan Motor</label>
                                <select class="form-control" id="motor" name="motor" required>
                                    <option value="motor1">Motor 1</option>
                                    <option value="motor2">Motor 2</option>
                                    <option value="motor3">Motor 3</option>
                                    <!-- Tambahkan opsi motor sesuai dengan data yang Anda miliki -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gejala">Pertanyaan Gejala</label>
                                <select class="form-control" id="gejala" name="gejala" required>
                                    @foreach ($gejala as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['pertanyaan'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach ($gejala as $item)
                                <div class="form-group">
                                    <label for="gejala{{ $item['id'] }}">{{ $item['pertanyaan'] }}</label>
                                    <select class="form-control" id="gejala{{ $item['id'] }}" name="gejala{{ $item['id'] }}" required>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            @endforeach

                            <!-- Tambahkan elemen form lainnya sesuai dengan susunan yang Anda berikan -->

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
