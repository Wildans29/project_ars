<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function penyakit() {
    	return $this->belongsToMany('App\Models\Penyakit', 'aturan');
    }

    public function pasien() {
    	return $this->belongsToMany('App\Models\Pasien', 'tmp_gejala');
    }
}
