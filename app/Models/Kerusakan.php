<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'kerusakan';
    protected $fillable = ['kode_kerusan', 'nama'];

    public function aturans()
    {
        return $this->hasMany(Aturan::class, 'kode_kerusakan', 'kode_gejala');
    }
}