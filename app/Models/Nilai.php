<?php

namespace App\Models;

use App\DaftarNilai;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nilais';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['kategori_tugas', 'id_mahasiswa', 'id_kelas', 'id_mata_kuliah', 'nilai', 'id_daftar_nilai'];



    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }

    public function daftarNilai()
    {
        return $this->belongsTo(DaftarNilai::class, 'id_daftar_nilai');
    }
}
