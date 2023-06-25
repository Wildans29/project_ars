<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kerusakan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'kerusakan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['kode_kerusakan','nama',];

    // Relasi dengan model Aturan
    public function aturan()
    {
        return $this->hasMany(Aturan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
