<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class KehadiranDetail extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kehadiran_details';

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
    protected $fillable = ['id_kehadiran', 'id_mahasiswa', 'status'];



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

    public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'id_kehadiran');
    }
}
