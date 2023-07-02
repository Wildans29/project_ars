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
            $solusi[] = $aturan->solusi;
        }
        
        // Kembalikan hasil diagnosa
        return [
            'kerusakan' => $kerusakan,
            'solusi' => $solusi
        ];

    }


    public function upsertGejala($id, $pertanyaanId)
    {
        // Ambil gejala yang sudah ada
        $pertanyaan  = $pertanyaanId;
        // $gejala = $this->gejala;

        if (empty($pertanyaan)) {
            $gejala = [];
        } else {
            $gejala = $pertanyaan;
            // $gejala = explode(",", $gejala);
            $diagnosa = self::where('id', $id)->first();
            $mergeGejala = $diagnosa->gejala . ','. $gejala;
            $hasil = ltrim($mergeGejala, ', ');

            $this->gejala = $hasil;
            $this->save();
        }

        // $this->gejala = implode(",", $gejala);
        
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
        // $nextGejala = Gejala::whereNotIn('kode_gejala', [$gejala])->first();

        // return $nextGejala;
        // return true;
    }

    // public function getNextGejala()
    // {
    //    // Explode gejala dalam table diagnosa dari separated comma ke array
    //     $gejala = explode(",", $this->gejala);;

    //    // Ambil pertanyaan berikutnya
    //     $nextGejala = Gejala::whereNotIn('kode_gejala', $gejala)->first();

    //     return $nextGejala;
    // }
}