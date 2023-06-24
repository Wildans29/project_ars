<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sp extends Model
{
    use HasFactory;

    protected $table = 'diagnosa';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
