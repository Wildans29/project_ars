    @extends('layouts.master')

    @section('title')
        Status Booking
    @endsection

    @section('breadcrumb')
        @parent
        <li class="active">Status Booking</li>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Status Booking</h3>
                    </div>
                    <div class="box-body">
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
                                @foreach ($booking as $booking)
                                    <tr>
                                        <td>{{ $booking->kode_booking }}</td>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->telepon }}</td>
                                        <td>{{ $booking->merk }}</td>
                                        <td>{{ $booking->type }}</td>
                                        <td>{{ $booking->tanggal }}</td>
                                        <td>{{ $booking->waktu }}</td>
                                        <td>{{ $booking->keluhan }}</td>
                                        <td>
                                            @if ($booking->status_service)
                                                Sudah Service
                                            @else
                                                Belum Service
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$booking->status_service && isServiceTimeValid($booking->tanggal, $booking->waktu))
                                                <form action="{{ route('booking.service', ['id' => $booking->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Sudah Service</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
