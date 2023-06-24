<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function submit(Request $request)
    {
        // Ambil nilai-nilai yang dikirimkan melalui formulir
        $nama = $request->input('nama');
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tanggal = $request->input('tanggal');
        $waktu = $request->input('waktu');
        $keluhan = $request->input('keluhan');
    
        // Generate kode booking dengan kombinasi huruf dan angka
        $kodeBooking = Str::random(5); // Menghasilkan 5 karakter acak
    
        // Dapatkan user saat ini
        $user = auth()->user();
    
        // Simpan data ke tabel booking
        $booking = new Booking();
        $booking->kode_booking = $kodeBooking;
        $booking->nama = $nama;
        $booking->email = $email;
        $booking->telepon = $telepon;
        $booking->merk = $merk;
        $booking->type = $type;
        $booking->tanggal = $tanggal;
        $booking->waktu = $waktu;
        $booking->keluhan = $keluhan;
        $booking->user_id = $user->id; // Mengisi kolom user_id dengan id user saat ini
        $booking->save();
    
        // Simpan data booking dalam session untuk dikirimkan ke halaman berhasil
        Session::put('booking', $booking);
    
        // Redirect ke halaman berhasil
        return redirect()->route('pelanggan.berhasil');
    }
    

    public function markAsServiced($id)
    {
        $booking = Booking::find($id);

        // Periksa apakah waktu service masih valid
        if (!$this->isServiceTimeValid($booking->tanggal, $booking->waktu)) {
            return redirect()->back()->with('error', 'Waktu service telah berakhir.');
        }

        // Set status service menjadi true (sudah dilayani)
        $booking->status_service = true;
        $booking->save();

        return redirect()->back()->with('success', 'Status service berhasil diperbarui.');
    }

    public function isServiceTimeValid($tanggal, $waktu)
    {
        $serviceDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal . ' ' . $waktu);
        $currentDateTime = Carbon::now();
    
        return $serviceDateTime->greaterThan($currentDateTime);
    }
    public function updateServiceStatus($id)
    {
        // Temukan booking berdasarkan ID
        $booking = Booking::find($id);
    
        if (!$booking) {
            // Jika booking tidak ditemukan, berikan respon atau tangani sesuai kebutuhan
            return response()->json(['message' => 'Booking not found'], 404);
        }
    
        // Perbarui status service menjadi true (sudah service)
        $booking->status_service = true;
        $booking->save();
    
        // Berikan respon berhasil atau tangani sesuai kebutuhan
        return response()->json(['message' => 'Service status updated successfully'], 200);
    }
    
    
    public function showStatus()
    {

        $booking['booking'] = Booking::all();

        return view('pelanggan.status')->with($booking);

    }

    public function showSuccess()
    {
        $booking = Session::get('booking');
        Session::forget('booking');

        return view('pelanggan.berhasil', compact('booking'));
    }
}
