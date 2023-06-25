<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = 'kerusakan';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'kode_kerusakan',
        'nama',
    ];

    // Relasi dengan model Aturan
    public function aturan()
    {
        return $this->hasMany(Aturan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
