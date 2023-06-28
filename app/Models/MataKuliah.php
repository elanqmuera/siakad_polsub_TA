<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mata_kuliahs';

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
    protected $fillable = ['nama_mata_kuliah', 'id_prodi', 'kode_mata_kuliah', 'sks'];



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
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi');
    }
}
