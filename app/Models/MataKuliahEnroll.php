<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MataKuliahEnroll extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mata_kuliah_enrolls';

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
    protected $fillable = ['id_kelas_enroll', 'id_mata_kuliah', 'id_dosen'];



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

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mata_kuliah');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }

    public function kelas()
    {
        return $this->belongsTo(Kela::class, 'id_kelas_enroll');
    }
}
