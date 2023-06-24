<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKonsultasi extends Model
{
    protected $table = 'diagnosa';

    protected $fillable = [
        'id',
        'motor',
        'gejala',
        'tgl_konsultasi',
        'user_id',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
