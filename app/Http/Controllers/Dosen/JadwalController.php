<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kehadiran;
use App\Models\MataKuliahEnroll;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(){
        // $data['mataKuliah'] = MataKuliahEnroll::where([
        //     'id_dosen' => auth()->user()->id,
        // ])->latest()->get();
        return view('dosen.jadwal.index');
    }

    public function show($id){
        $data['jadwal'] = Jadwal::where(['id' => $id])->with('mataKuliahEnroll')->first();
        if($data['jadwal']->mataKuliahEnroll->id_dosen != auth()->user()->id){
            abort(403);
        }

        $data['kehadiran'] = Kehadiran::where([
            'id_jadwal' => $data['jadwal']->id,
        ])->latest()->get();

        return view('dosen.jadwal.show', $data);
    }
}
