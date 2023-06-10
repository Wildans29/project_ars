<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKonsultasi extends Model
{
    protected $table = 'riwayat_konsultasi';

    protected $fillable = [
        'kerusakan',
        'user_id',
        'hasil_konsultasi',
        'waktu_konsultasi',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
