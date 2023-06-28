<?php

namespace App;

use App\Models\Kela;
use App\Models\MataKuliahEnroll;
use Illuminate\Database\Eloquent\Model;

class DaftarNilai extends Model
{
    protected $fillable = [
        'kategori_tugas',
        'id_kelas',
        'id_mata_kuliah',
        'id_tahun_ajaran'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kela::class, 'id_kelas');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliahEnroll::class, 'id_mata_kuliah');
    }
}
