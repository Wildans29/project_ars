<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $kode_kerusakan
 * @property string $pertanyaan
 * @property int $bila_benar
 * @property int $bila_salah
 * @property string $solusi
 */
class Gejala extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gejala';
    

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $fillable = ['kode_kerusakan', 'pertanyaan', 'bila_benar', 'bila_salah', 'solusi'];

    public function kerusakan()
    {
        return $this->hasOne(Kerusakan::class, 'kode', 'kode_kerusakan');
    }
}
