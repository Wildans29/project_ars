<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aturan;


class Diagnosa extends Model
{
    protected $table = 'diagnosa';
    protected $fillable = ['motor', 'gejala', 'tgl_konsultasi', 'user_id'];
    public $timestamps = false;

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
    }
}