<?php

namespace App\Http\Controllers\Dosen;

use App\DaftarNilai;
use App\Http\Controllers\Controller;
use App\MahasiswaMataKuliahEnroll;
use App\Models\Kela;
use App\Models\MataKuliahEnroll;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id_dosen' => auth()->user()->id,
        ])->with(['kelas', 'mataKuliah'])->get();
        return view('dosen.nilai.index', $data);
    }

    public function show($id){
        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id_dosen' => auth()->user()->id,
            'id' => $id
        ])->with(['kelas', 'mataKuliah'])->first();

        $data['daftarNilai'] = DaftarNilai::where([
            'id_mata_kuliah' => $id,
        ])->with(['kelas'])->get();
        return view('dosen.nilai.show', $data);
    }

    public function storeDaftarNilai(Request $request, $idMataKuliah){
        $request->validate([
            'kategori_tugas' => 'required'
        ]);

        $mataKuliah = MataKuliahEnroll::where('id', $idMataKuliah)->first();
        $kelas = Kela::where(['id' => $mataKuliah->id_kelas_enroll])->first();

        $DaftarNilai = DaftarNilai::create([
            'kategori_tugas' => $request->kategori_tugas,
            'id_kelas' => $mataKuliah->id_kelas_enroll,
            'id_mata_kuliah' => $idMataKuliah,
            'id_tahun_ajaran' => $kelas->id_tahun_ajaran
        ]);

        $DaftarNilai = DaftarNilai::where([
            'kategori_tugas' => $request->kategori_tugas,
            'id_kelas' => $mataKuliah->id_kelas_enroll,
            'id_mata_kuliah' => $idMataKuliah,
            'id_tahun_ajaran' => $kelas->id_tahun_ajaran
        ])->latest()->first();

        $mahasiswa = MahasiswaMataKuliahEnroll::where([
            'id_mata_kuliah_enroll' => $idMataKuliah,
        ])->get();

        foreach ($mahasiswa as $index => $student) {
            Nilai::create([
                'id_daftar_nilai' => $DaftarNilai->id,
                'id_mahasiswa' => $student->id_mahasiswa,
                'nilai' => 0,
            ]);
        }

        alert()->success('Tugas baru berhasil dibuat');
        return redirect('dosen/nilai/'.$idMataKuliah);
    }

    public function detailDaftarNilai($idDaftarNilai){
        $data['daftarNilai'] = DaftarNilai::where(['id' => $idDaftarNilai])->with(['kelas', 'mataKuliah.mataKuliah'])->first();
        $data['mahasiswa'] = Nilai::where([
            'id_daftar_nilai' => $idDaftarNilai
        ])->with(['mahasiswa'])->get();

        return view('dosen.nilai.detail-nilai-show', $data);
    }

    public function storeDetailDaftarNilai(Request $request, $idDaftarNilai){
        $mahasiswa = Nilai::where([
            'id_daftar_nilai' => $idDaftarNilai
        ])->with(['mahasiswa'])->get();

        foreach ($mahasiswa as $index => $student) {
            Nilai::where([
                'id_daftar_nilai' => $idDaftarNilai,
                'id_mahasiswa' => $student->id_mahasiswa
            ])->update([
                'nilai' => $request->nilai[$index]
            ]);
        }

        alert()->success('Nilai berhasil diubah');
        return redirect('dosen/nilai/');
    }
}
