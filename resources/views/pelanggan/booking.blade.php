@extends('layouts.master')

@section('title')
    Booking Service
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Booking Service</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Form Booking Service</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('booking.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="tel" name="telepon" class="form-control" id="telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk:</label>
                        <select name="merk" class="form-control" id="merk" required>
                            <option value="honda">Honda</option>
                            <option value="yamaha">Yamaha</option>
                            <option value="suzuki">Suzuki</option>
                            <option value="kawasaki">Kawasaki</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="type">Type dan Plat nomor kendaran:</label>
                        <input type="text" name="type" class="form-control" id="type" placeholder="Contoh: Vario (B111UZC)" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu:</label>
                        <input type="time" name="waktu" class="form-control" id="waktu" required>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan Kerusakan</label>
                        <input type="text" name="keluhan" class="form-control" id="keluhan" required>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
