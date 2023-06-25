<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aturan;


class Diagnosa extends Model
{
    protected $table = 'diagnosa';
    protected $fillable = ['motor', 'gejala', 'tgl_konsultasi', 'user_id'];
    public $timestamps = false;

    // public function gejala()
    // {
    //     return $this->hasMany(Gejala::class, 'gejala', 'id');
    // }

  


    

    public function getResultDiagnosa($id)
{
    // Ambil diagnosa berdasarkan ID
    $diagnosa = self::where('id', $id)->first();

    // Ambil gejala yang terekam
    $gejalaTerekam = explode(",", $diagnosa->gejala);

    // Cari aturan yang cocok dengan gejala yang terekam
    $aturanCocok = Aturan::where('kode_gejala', implode(",", $gejalaTerekam))->get();

    $kerusakan = [];
    $solusi = [];

    // Ambil kode kerusakan dan solusi dari aturan yang cocok
    foreach ($aturanCocok as $aturan) {
        $kerusakan[] = $aturan->kerusakan->nama;
        $solusi[] = $item['solusi'];
    }
    
    // Kembalikan hasil diagnosa
    return [
        'kerusakan' => $kerusakan,
        'solusi' => $solusi
    ];
}


    public function upsertGejala($pertanyaanId)
    {
        // Ambil gejala yang sudah ada
        $gejala  = $pertanyaanId;
        // $gejala = $this->gejala;

        
        if (empty($gejala)) {
            $gejala = [];
        } else {
            $gejala = explode(",", $gejala);
        }
        $this->gejala = implode(",", $gejala);
        $this->save();
        
        // Cek apakah pertanyaan sudah dijawab sebelumnya
        // if (!in_array($this->id, $gejala)) {
        //     // Tambahkan pertanyaan ke dalam gejala
        //     $gejala[] = $this->id;
        //     $this->gejala = $gejala
        //     $this->setAttribute('gejala', implode(",", $gejala));
        //     $this->save();
        // }
        // Explode gejala dalam table diagnosa dari separated comma ke array
    
       // Ambil pertanyaan berikutnya
        $nextGejala = Gejala::whereNotIn('id', $gejala)->orderBy('id')->first();

        return $nextGejala;
        // return true;
    }

    public function getNextGejala()
    {

       // Explode gejala dalam table diagnosa dari separated comma ke array
        $gejala = explode(",", $this->gejala);
    
       // Ambil pertanyaan berikutnya
        $nextGejala = Gejala::whereNotIn('id', $gejala)->orderBy('id')->first();

        return $nextGejala;
    }
}