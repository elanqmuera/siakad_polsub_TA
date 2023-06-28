<?php

namespace App\Http\Controllers\Mahasiswa;

use App\DaftarNilai;
use App\Http\Controllers\Controller;
use App\MahasiswaMataKuliahEnroll;
use App\Models\Kela;
use App\Models\MataKuliahEnroll;
use App\Models\Nilai;
use App\Models\ProgramStudi;
use App\Models\TahunAjaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['mataKuliah'] = MahasiswaMataKuliahEnroll::
        where([
            'id_mahasiswa' => auth()->user()->id,
            ])
            ->with([
                'mataKuliahEnroll',
                'mataKuliahEnroll.kelas',
                'mataKuliahEnroll.mataKuliah'
            ])
            ->latest()->get();

        $data['totalMatkul'] = MahasiswaMataKuliahEnroll::where([
            'id_mahasiswa' => auth()->user()->id,
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
            $data['nilaiAngka'] = 0;
            if($data['totalSKS']){
                foreach ($nilaiByMataKuliah as $nilai) {
                    $checkAvailMatkul='';
                    $nilaiuts = 0;
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
            }
            if(count($data['nilaiRataRata']) > 0){
                $data['nilaiRataRata'] = array_reverse($data['nilaiRataRata']);
            }

        return view('mahasiswa.nilai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Kela::create($requestData);
        alert()->success('New ' . 'Kelas'. ' Created!' );

        return redirect('admin/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($idMataKuliahEnroll)
    {
        $checkMatkul = MahasiswaMataKuliahEnroll::where([
            'id_mata_kuliah_enroll' => $idMataKuliahEnroll,
            'id_mahasiswa' => auth()->user()->id,
        ])->first();

        if(!$checkMatkul){
            return abort(403);
        }
        $daftarNilai = DaftarNilai::where([
            'id_mata_kuliah' => $idMataKuliahEnroll
        ])->get();

        $idDaftarNilai = $daftarNilai->pluck('id');

        $data['nilai'] = Nilai::whereIn('id_daftar_nilai', $idDaftarNilai)
                ->where([
                    'id_mahasiswa' => auth()->user()->id,
                ])
                ->with(['daftarNilai'])
                ->get();

        $data['mataKuliah'] = MataKuliahEnroll::where([
            'id' => $idMataKuliahEnroll,
        ])->with(['dosen', 'mataKuliah', 'kelas'])->first();

        return view('mahasiswa.nilai.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $kela = Kela::findOrFail($id);
        $data['kelas'] = $kela;
        $data['tahun_ajaran'] = TahunAjaran::select(TahunAjaran::raw("CONCAT('Semester ', COALESCE(`semester`,''),' Tahun ',COALESCE(`tahun`,'')) AS nama_tahun"),'id')->pluck('nama_tahun', 'id');
        $data['dosen_wali'] = User::where([
            'id_role' => 2
        ])->pluck('name', 'id');
        $data['program_studi'] = ProgramStudi::pluck('nama_prodi', 'id');
        return view('admin.kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $kela = Kela::findOrFail($id);
        alert()->success('Record Updated!' );
        $kela->update($requestData);

        return redirect('admin/kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        alert()->success('Record Deleted!' );
        Kela::destroy($id);

        return redirect('admin/kelas');
    }
}
