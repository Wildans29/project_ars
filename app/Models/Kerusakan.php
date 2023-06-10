<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $kode
 * @property string $nama
 */
class Kerusakan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kerusakan';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $fillable = ['kode', 'nama'];
}
