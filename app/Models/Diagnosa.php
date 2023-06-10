<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $motor
 * @property string $gejala
 * @property string $nama
 */
class Diagnosa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'diagnosa';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['nama', 'motor', 'gejala'];

    /**
     * @param $id
     * @return array
     */
    function getResultDiagnosa($id): array
    {
        $data = [];
        $diagnosa = self::where('id', $id)->first();
        $gejalas = explode(",", $diagnosa->gejala);
        $data["kerusakan"] = Kerusakan::all()->toArray();
        $data["kode_kerusakan"] = [];
        $data["charttmp"] = [];
        $data["chart"] = [];
        foreach ($gejalas as $key => $value) {
            $item = Gejala::where('id', $value)->first()->toArray();
            $data["gejala"][] = $item;
            if (!in_array($item["kode_kerusakan"], $data["kode_kerusakan"])) {
                $data["kode_kerusakan"][] = $item["kode_kerusakan"];
            }
        }

        //===Mendapatkan Data Chart
        foreach ($data["kode_kerusakan"] as $key => $value) {
            $data["charttmp"][$value] = 0;
        }

        foreach ($gejalas as $row => $item) {
            $gejala = Gejala::where('id', $item)->first()->toArray();
            if (in_array($gejala["kode_kerusakan"], $data["kode_kerusakan"])) {
                $data["charttmp"][$gejala["kode_kerusakan"]] = ++$data["charttmp"][$gejala["kode_kerusakan"]];
            }
        }

        // Data Hasil Untuk Chart
        foreach ($data["charttmp"] as $row => $item) {
            $kerusakan = Kerusakan::where('kode', $row)->first();
            $data["chart"][] = [
                "name" => $kerusakan->nama,
                "y" => $item
            ];
        }
        //==End Get Data Chart

        return $data;
    }

    /**
     * @param $id
     * @param $pertanyaanId
     * @return bool
     */
    function upsertGejala($id, $pertanyaanId): bool
    {
        // Ambil Detail Diagnosa
        $diagnosa = self::where('id', $id)->first();
        // Explode gejala dalam table diagnosa dari separated comma ke array
        $gejala = explode(",", $diagnosa->gejala);
        if ($gejala[0] == "") {
            $diagnosa->gejala = $pertanyaanId;
            $isSaved = $diagnosa->save();
            if (!$isSaved) return false;
        } else {
            if (!in_array($pertanyaanId, $gejala)) { // kalau id belum ada di array
                // Tambahkan id pertanyaan jika user memilih ya ke array gejala
                array_push($gejala, $pertanyaanId);
                // implode kembali kedalam separated comma dari array
                $diagnosa->gejala = implode(",", $gejala);
                // simpan diagnosa
                $isSaved = $diagnosa->save();
                if (!$isSaved) return false;
            }
        }
        return true;
    }

}
