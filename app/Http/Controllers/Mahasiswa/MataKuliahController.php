<?php

namespace App\Http\Controllers\Mahasiswa;

use App\DaftarNilai;
use App\Http\Controllers\Controller;
use App\MahasiswaMataKuliahEnroll;
use App\Models\Jadwal;
use App\Models\Kehadiran;
use App\Models\KehadiranDetail;
use App\Models\KelasEnroll;
use App\Models\MataKuliah;
use App\Models\MataKuliahEnroll;
use App\Models\Nilai;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['mataKuliah'] = MahasiswaMataKuliahEnroll::where(['id_mahasiswa' => auth()->user()->id])->with(['mataKuliahEnroll.mataKuliah', 'mataKuliahEnroll.kelas'])->latest()->get();
        $data['kelas'] = KelasEnroll::where([
            'id_mahasiswa' => auth()->user()->id,
        ])->with(['kelas'])->latest()->get();

        $data['kelas'] = $data['kelas']->pluck('kelas.nama_kelas','kelas.id' );

        return view('mahasiswa.mata-kuliah.index', $data);
    }

    public function show($idMataKuliahEnroll){
        $checkMatkul = MahasiswaMataKuliahEnroll::where([
            'id_mata_kuliah_enroll' => $idMataKuliahEnroll,
            'id_mahasiswa' => auth()->user()->id,
        ])->first();

        if(!$checkMatkul){
            return abort(403);
        }
    $jadwal = Jadwal::where([
        'id_mata_kuliah_enroll' => $idMataKuliahEnroll
    ])->first();

    if(!$jadwal){
        return back();
    }

    $data['mataKuliah'] = MataKuliahEnroll::where([
        'id' => $idMataKuliahEnroll,
    ])->with(['mataKuliah', 'kelas'])->first();

    $kehadiran = Kehadiran::where('id_jadwal', $jadwal->id)->get();


    $kehadiranIds = $kehadiran->pluck('id');

    $data['kehadiran'] =KehadiranDetail::whereIn('id_kehadiran', $kehadiranIds)
    ->where('id_mahasiswa', auth()->user()->id)
    ->with([
        'kehadiran',
        'kehadiran.jadwal.mataKuliahEnroll.mataKuliah',
        'kehadiran.jadwal.mataKuliahEnroll.kelas'
        ])
    ->latest()
    ->get();

    $nilai = DaftarNilai::where([
        'id_mata_kuliah' => $idMataKuliahEnroll
    ])->get();

    $nilaiIds = $nilai->pluck('id');
    $data['nilai'] = Nilai::whereIn(
        'id_daftar_nilai', $nilaiIds
    )
    ->where([
        'id_mahasiswa' => auth()->user()->id,
    ])
    ->with([
        'daftarNilai',
    ])
    ->latest()->get();

    return view('mahasiswa.mata-kuliah.show', $data);

    }

    public function store(Request $request){
        $request->validate([
            'id_kelas_enroll' => 'required',
            'kode_mata_kuliah' => 'required'
        ]);

        $kelasEnroll = KelasEnroll::where([
            'id' => $request->id_kelas_enroll,
        ])->first();

        $mataKuliah = MataKuliah::where([
            'id_prodi' =>auth()->user()->id_prodi,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
        ])->first();

        if(!$kelasEnroll || !$mataKuliah){
            alert()->error('Data tidak ditemukan');
            return redirect('mahasiswa/mata-kuliah/');
        }

        $mataKuliahEnroll = MataKuliahEnroll::where([
            'id_kelas_enroll' => $kelasEnroll->id_kelas,
            'id_mata_kuliah' => $mataKuliah->id,
        ])->first();

        if(!$mataKuliahEnroll){
            alert()->error('Data tidak ditemukan');
            return redirect('mahasiswa/mata-kuliah/');
        }

        $MahasiswaMataKuliahEnroll = MahasiswaMataKuliahEnroll::where([
            'id_mata_kuliah_enroll' => $mataKuliahEnroll->id,
            'id_mahasiswa' => auth()->user()->id,
        ])->first();

        if($MahasiswaMataKuliahEnroll){
            alert()->error('Kode sudah digunakan');
            return redirect('mahasiswa/mata-kuliah/');
        }


        MahasiswaMataKuliahEnroll::create([
            'id_mata_kuliah_enroll' => $mataKuliahEnroll->id,
            'id_mahasiswa' => auth()->user()->id,
        ]);
        alert()->success('Berhasil redeem kode');
            return redirect('mahasiswa/mata-kuliah/');
    }
}
