<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKonsultasi extends Model
{
<<<<<<< HEAD
    protected $table = 'diagnosa';

    protected $fillable = [
        'id',
        'motor',
        'gejala',
        'tgl_konsultasi',
        'user_id',
=======
    protected $table = 'riwayat_konsultasi';

    protected $fillable = [
        'kerusakan',
        'user_id',
        'hasil_konsultasi',
        'waktu_konsultasi',
>>>>>>> d8e6ef8e3245eebed6ae2ce463295b0119af4271
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
