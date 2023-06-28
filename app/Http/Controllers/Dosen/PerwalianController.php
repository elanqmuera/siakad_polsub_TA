<?php

namespace App\Http\Controllers\Dosen;

use App\DaftarNilai as AppDaftarNilai;
use App\Http\Controllers\Controller;
use App\MahasiswaMataKuliahEnroll;
use App\Models\Kela;
use App\Models\KelasEnroll;
use App\Models\MataKuliahEnroll;
use App\Models\Nilai;
use App\Perwalian;
use App\User;
use DaftarNilai;
use Illuminate\Http\Request;

class PerwalianController extends Controller
{
    public function index(){
        $data['kelas'] = Kela::where([
            'id_dosen_wali' => auth()->user()->id,
        ])->latest()->get();
        return view('dosen.perwalian.index', $data);
    }


    public function show ($idKelas){
        $checkKelas = Kela::where([
            'id' => $idKelas,
            'id_dosen_wali' => auth()->user()->id,
        ])->first();

        if(!$checkKelas){
            return abort(403);
        }
        $data['keluhan'] = Perwalian::where([
            ['id_kelas', '=', $idKelas],
            ['balasan', '=', null],
        ])->with(['mahasiswa'])->get();

        $data['mahasiswa'] = KelasEnroll::where([
            'id_kelas' => $idKelas
        ])->with(['mahasiswa'])->get();
        $data['idKelas'] = $idKelas;
        return view('dosen.perwalian.show', $data);
    }

    public function update(Request $request, $idPerwalian){
        $request->validate([
            'balasan' => 'required'
        ]);

        Perwalian::where([
            'id' => $idPerwalian
        ])->update([
            'balasan' => $request->balasan,
        ]);

        alert()->success('Berhasil mengubah data');
        return redirect('dosen/perwalian');
    }

    public function showMatkulMahasiswa($idKelas, $idMahasiswa){
        $checkKelasEnroll = KelasEnroll::where([
            'id_mahasiswa' => $idMahasiswa,
            'id_kelas' => $idKelas,
        ])->first();

        if(!$checkKelasEnroll){
            alert()->error('Data tidak ditemukan');
            return back();
        }
        $checkKelas = Kela::where([
            'id' => $idKelas,
            'id_dosen_wali' => auth()->user()->id,
        ])->first();

        if(!$checkKelas){
            alert()->error('Data tidak ditemukan');
            return back();
        }

        $data['mahasiswa'] = User::where(['id' => $idMahasiswa])->first();
        $data['idKelas'] = $idKelas;
        $data['idMahasiswa'] = $idMahasiswa;

        $data['mataKuliah'] = MahasiswaMataKuliahEnroll::
        where([
            'id_mahasiswa' => $idMahasiswa,
            ])
            ->with([
                'mataKuliahEnroll',
                'mataKuliahEnroll.kelas',
                'mataKuliahEnroll.mataKuliah'
            ])
            ->latest()->get();

        $data['totalMatkul'] = MahasiswaMataKuliahEnroll::where([
            'id_mahasiswa' => $idMahasiswa,
        ])->count();

        $data['totalSKS'] = 0;

        foreach ($data['mataKuliah'] as $index => $matkul) {
            $data['totalSKS'] += $matkul->mataKuliahEnroll->mataKuliah->sks;
        }

        $nilaiByMataKuliah = Nilai::join('daftar_nilais', 'nilais.id_daftar_nilai', '=', 'daftar_nilais.id')
            ->select('daftar_nilais.*', 'nilais.*')
            ->orderBy('daftar_nilais.kategori_tugas')
            ->with(['daftarNilai.mataKuliah.mataKuliah'])
            ->get()
            ->groupBy(['id_mata_kuliah', 'kategori_tugas']);

            $sigmaNilai = 0;
            $data['nilaiRataRata'] = [];
            foreach ($nilaiByMataKuliah as $nilai) {
                $nilaiuts = 0;
                $checkAvailMatkul='';
                $nilaitugas = 0;
                $nilaiuas = 0;
                if(isset($nilai['UTS'])){
                    $checkAvailMatkul = $nilai['UTS'];
                    if(count($nilai['UTS']) > 0){
                        foreach ($nilai['UTS'] as $index => $uts) {
                            $nilaiuts += $uts->nilai;
                        }
                    }
                }
                if(isset($nilai['UAS'])){
                    $checkAvailMatkul = $nilai['UAS'];
                    if(count($nilai['UAS']) > 0){
                        foreach ($nilai['UAS'] as $index => $uas) {
                            $nilaiuas += $uas->nilai;
                        }
                    }
                }
                if(isset($nilai['Tugas/Kuis'])){
                    $checkAvailMatkul = $nilai['Tugas/Kuis'];
                    if(count($nilai['Tugas/Kuis']) > 0){
                        foreach ($nilai['Tugas/Kuis'] as $index => $tugas) {
                            $nilaitugas += $tugas->nilai;
                        }
                    }
                }
                $nilaiTotal = $nilaitugas*0.3 + $nilaiuts*0.3 + $nilaiuas*0.4;
                if($nilaiTotal >= 85){
                    $nilaiTotal = 4;
                }elseif($nilaiTotal >= 78){
                    $nilaiTotal = 3.5;
                }elseif($nilaiTotal >= 70){
                    $nilaiTotal = 3;
                }elseif($nilaiTotal >= 63){
                    $nilaiTotal = 2.5;
                }elseif($nilaiTotal >= 55){
                    $nilaiTotal = 2;
                }elseif($nilaiTotal >= 40){
                    $nilaiTotal = 1;
                }elseif($nilaiTotal < 40){
                    $nilaiTotal = 0;
                }
                $sigmaNilai += $checkAvailMatkul[0]['daftarNilai']['mataKuliah']['mataKuliah']['sks'] * $nilaiTotal;

                $rataRata = $checkAvailMatkul[0]['daftarNilai']['mataKuliah']['mataKuliah']['sks'] * $nilaiTotal;
                if($rataRata == 4){
                    $rataRata = 'A';
                }elseif($rataRata >= 3.5){
                    $rataRata = 'AB';
                }elseif($rataRata >= 70){
                    $rataRata = 'B';
                }elseif($rataRata >= 63){
                    $rataRata = 'BC';
                }elseif($rataRata >= 55){
                    $rataRata = 'C';
                }elseif($rataRata >= 40){
                    $rataRata = 'D';
                }elseif($rataRata < 40){
                    $rataRata = 'E';
                }
                $data['nilaiRataRata'][] = $rataRata;
            }

            $data['nilaiAngka'] = $sigmaNilai / $data['totalSKS'];
            if(count($data['nilaiRataRata']) > 0){
                $data['nilaiRataRata'] = array_reverse($data['nilaiRataRata']);
            }

        return view('dosen.perwalian.mata-kuliah-mahasiswa', $data);


    }

    public function showNilaiMahasiswa($idKelas, $idMahasiswa, $idMataKuliahEnroll){
        $checkKelasEnroll = KelasEnroll::where([
            'id_mahasiswa' => $idMahasiswa,
            'id_kelas' => $idKelas,
        ])->first();

        if(!$checkKelasEnroll){
            alert()->error('Data tidak ditemukan');
            return back();
        }
        $checkKelas = Kela::where([
            'id' => $idKelas,
            'id_dosen_wali' => auth()->user()->id,
        ])->first();

        if(!$checkKelas){
            alert()->error('Data tidak ditemukan');
            return back();
        }

        $checkMahasiswaMatkulEnroll = MahasiswaMataKuliahEnroll::where([
            'id_mahasiswa' => $idMahasiswa,
            'id_mata_kuliah_enroll' => $idMataKuliahEnroll,
        ])->first();

        if(!$checkMahasiswaMatkulEnroll){
            alert()->error('Data tidak ditemukan');
            return back();
        }

        $data['mahasiswa'] = User::where(['id' => $idMahasiswa])->first();
        $daftarNilai = AppDaftarNilai::where([
            'id_mata_kuliah' => $idMataKuliahEnroll
        ])->get();

        $idDaftarNilai = $daftarNilai->pluck('id');

        $data['nilai'] = Nilai::whereIn('id_daftar_nilai', $idDaftarNilai)
                ->where([
                    'id_mahasiswa' => $idMahasiswa,
                ])
                ->with(['daftarNilai'])
                ->get();

        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id' => $idMataKuliahEnroll,
        ])->with(['dosen', 'mataKuliah', 'kelas'])->first();

        return view('dosen.perwalian.show-nilai-mahasiswa', $data);

    }
}
