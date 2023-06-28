<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Kela;
use App\Models\KelasEnroll;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index(){
        if(session()->get('is_wali')){
            return abort(403);
        }

        $data['kelas'] = KelasEnroll::where([
            'id_mahasiswa' => auth()->user()->id,
        ])
        ->with(['kelas'])
        ->latest()->get();
        return view('mahasiswa.kelas.index', $data);
    }

    public function store(Request $request){
        $request->validate([
            'kode_kelas' => 'required'
        ]);

        $kelas = Kela::where([
            'kode_kelas' => $request->kode_kelas,
            'id_prodi' => auth()->user()->id_prodi
        ])->first();

        if(!$kelas){
            alert()->error('Kode tidak sesuai');
            return redirect('mahasiswa/kelas/');
        }

        $checkKelas = KelasEnroll::where([
            'id_mahasiswa' => auth()->user()->id,
            'id_kelas' => $kelas->id
        ])->first();

        if($checkKelas){
            alert()->error('Kelas sudah diredeem sebelumnya');
            return redirect('mahasiswa/kelas/');
        }

        KelasEnroll::create([
            'id_mahasiswa' => auth()->user()->id,
            'id_kelas' => $kelas->id
        ]);

        alert()->success('Berhasil redeem kelas');
        return redirect('mahasiswa/kelas');
    }
}
