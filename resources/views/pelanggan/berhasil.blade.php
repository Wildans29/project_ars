@extends('layouts.master')

@section('title')
    Booking Service
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Booking Service</li>
@endsection

@section('content')
<div class="container">
   
    <div class="ticket">
        @if(session()->has('booking'))
        <h3 class="ticket-title">Booking Service Berhasil!!!</h3>
        <p class="ticket-text">Terima kasih, booking service anda telah berhasil.</p>
        <div class="ticket-details">
            <div class="ticket-info">
                <span class="ticket-label">Nama:</span>
                <span class="ticket-value">{{ session()->get('booking')->nama }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Email:</span>
                <span class="ticket-value">{{ session()->get('booking')->email }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Telepon:</span>
                <span class="ticket-value">{{ session()->get('booking')->telepon }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Merk:</span>
                <span class="ticket-value">{{ session()->get('booking')->merk }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Type:</span>
                <span class="ticket-value">{{ session()->get('booking')->type }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Tanggal:</span>
                <span class="ticket-value">{{ session()->get('booking')->tanggal }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Waktu:</span>
                <span class="ticket-value">{{ session()->get('booking')->waktu }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Keluhan:</span>
                <span class="ticket-value">{{ session()->get('booking')->keluhan }}</span>
            </div>
            <div class="ticket-info">
                <span class="ticket-label">Kode Booking:</span>
                <span class="ticket-value">{{ session()->get('booking')->kode_booking }}</span>
            </div>
            <p>Status booking anda bisa diakses di halaman Riwayat Booking</p>
        </div>
        @endif
    </div>
</div>
@endsection
