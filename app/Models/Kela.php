<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Kela extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kelas';

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
    protected $fillable = ['id_tahun_ajaran', 'nama_kelas', 'kode_kelas', 'id_dosen_wali', 'id_prodi'];



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

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran');
    }

    public function dosenWali()
    {
        return $this->belongsTo(User::class, 'id_dosen_wali');
    }
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi');
    }
}
