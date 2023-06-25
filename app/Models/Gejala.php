<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';

    public $incrementing = true;

    protected $fillable  = ['id', 'kode_gejala', 'pertanyaan', 'solusi', 'is_first'];

    public function kerusakan()
{
    return $this->belongsTo(Kerusakan::class, 'kode_gejala', 'kode_kerusakan');
}

//     public function kerusakan()
//     {
//         return $this->belongsToMany(Kerusakan::class, 'aturan', 'kode_gejala', 'kode_kerusakan');
//     }
}
