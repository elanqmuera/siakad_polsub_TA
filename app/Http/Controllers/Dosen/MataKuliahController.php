<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\MataKuliahEnroll;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(){
        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id_dosen' => auth()->user()->id,
        ])->with(['dosen', 'mataKuliah'])->latest()->get();
        return view('dosen.mata-kuliah.index', $data);
    }

    public function show($id){
        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id' => $id,
            'id_dosen' => auth()->user()->id,
        ])->with(['dosen', 'mataKuliah'])->first();

        if(!$data['mataKuliah']){
            return abort(403);
        }

        $data['jadwal'] = Jadwal::where([
            'id_mata_kuliah_enroll' => $id
        ])->latest()->get();

        return view('dosen.mata-kuliah.show', $data);
    }
}
