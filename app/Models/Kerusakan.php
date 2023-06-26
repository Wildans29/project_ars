<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;

    protected $table = 'kerusakan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['kode_kerusakan', 'nama'];

    // Relasi dengan model Aturan
    public function aturan()
    {
        return $this->belongsTo(Aturan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
