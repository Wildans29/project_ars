<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $fillable = ['kode_gejala', 'pertanyaan', 'solusi', 'is_first'];

    public function aturan()
    {
        return $this->hasMany(Aturan::class, 'kode_gejala', 'kode_gejala');
    }

    public function diagnosas()
    {
        return $this->hasMany(Diagnosa::class, 'gejala', 'id');
    }
}