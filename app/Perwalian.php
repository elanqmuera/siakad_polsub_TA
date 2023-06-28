<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Perwalian extends Model
{
    use Notifiable;
    protected $fillable = [
        'id_kelas',
        'id_mahasiswa',
        'balasan',
        'keluhan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
