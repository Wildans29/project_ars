@extends('layouts.master')

@section('title')
    Status Booking
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Status Booking</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Status Booking</h3>
                </div>
                <div class="box-body">
                    @if (count($booking) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Booking</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Keluhan</th>
                                    <th>Status Service</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $book)
                                    @if ($book->user_id == auth()->user()->id) {{-- Memeriksa apakah booking ini milik pengguna yang sedang login --}}
                                        <tr>
                                            <td>{{ $book->kode_booking }}</td>
                                            <td>{{ $book->nama }}</td>
                                            <td>{{ $book->email }}</td>
                                            <td>{{ $book->telepon }}</td>
                                            <td>{{ $book->merk }}</td>
                                            <td>{{ $book->type }}</td>
                                            <td>{{ $book->tanggal }}</td>
                                            <td>{{ $book->waktu }}</td>
                                            <td>{{ $book->keluhan }}</td>
                                            <td>
                                                @if ($book->status_service)
                                                    Sudah Service
                                                @else
                                                    Belum Service
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$book->status_service && !$book->is_booking_expired && app('App\Http\Controllers\BookingController')->isServiceTimeValid($book->tanggal, $book->waktu))
                                                <form action="{{ route('booking.service', ['id' => $book->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Sudah Service</button>
                                                </form>
                                                
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada data booking.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
