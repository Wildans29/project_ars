<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aturan extends Model
{
    use HasFactory;
    protected $table = 'aturan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['kode_kerusakan', 'kode_gejala', 'solusi'];
    public $timestamps = true;

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_kerusakan', 'kode_kerusakan');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }
}

