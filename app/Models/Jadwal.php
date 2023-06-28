<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jadwals';

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
    protected $fillable = ['id_mata_kuliah_enroll', 'hari', 'jam_mulai', 'jam_selesai'];



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

    public function mataKuliahEnroll()
    {
        return $this->belongsTo(MataKuliahEnroll::class, 'id_mata_kuliah_enroll');
    }


}
