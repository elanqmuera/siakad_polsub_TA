<?php

namespace App;

use App\Models\MataKuliahEnroll;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMataKuliahEnroll extends Model
{
    use Notifiable;
    protected $fillable = [
        'id_kehadiran',
        'id_mahasiswa',
        'status',
        'id_mata_kuliah_enroll'
    ];

    public function mataKuliahEnroll()
    {
        return $this->belongsTo(MataKuliahEnroll::class, 'id_mata_kuliah_enroll');
    }
}
