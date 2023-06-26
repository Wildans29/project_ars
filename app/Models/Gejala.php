<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'gejala';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable  = ['id', 'kode_gejala', 'pertanyaan', 'is_first'];


    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_gejala', 'kode_kerusakan');
    }
    
    //     public function kerusakan()
    //     {
    //         return $this->belongsToMany(Kerusakan::class, 'aturan', 'kode_gejala', 'kode_kerusakan');
    //     }
    
}
