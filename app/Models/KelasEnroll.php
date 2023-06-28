<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class KelasEnroll extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kelas_enrolls';

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
    protected $fillable = ['id_mahasiswa', 'id_kelas'];



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

    public function kelas()
    {
        return $this->belongsTo(Kela::class, 'id_kelas');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
