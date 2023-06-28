<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\MahasiswaMataKuliahEnroll;
use App\Models\Jadwal;
use App\Models\Kehadiran;
use App\Models\KehadiranDetail;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function store(Request $request, $idJadwal){
        $request->validate([
            'tanggal' => 'required'
        ]);

        $kehadiran = Kehadiran::create([
            'id_jadwal' => $idJadwal,
            'tanggal' => $request->tanggal
        ]);

        $jadwal = Jadwal::where([
            'id' => $idJadwal
        ])->first();



        $mahasiswa = MahasiswaMataKuliahEnroll::where([
            'id_mata_kuliah_enroll' => $jadwal->id_mata_kuliah_enroll
        ])->get();
        // Loop melalui setiap baris data sumber
        foreach ($mahasiswa as $row) {
            // Menambahkan data ke array
            KehadiranDetail::create([
                'id_kehadiran' => $kehadiran->id,
                'id_mahasiswa' => $row->id_mahasiswa,
                'status' => 'Tidak Hadir'
            ]);
        }


        alert()->success('New ' . 'Kehadiran'. ' Created!' );
        return redirect('/dosen/jadwal/'.$idJadwal);
    }

    public function show($idKehadiran){
        $data['kehadiranDetail'] = KehadiranDetail::where([
            'id_kehadiran' => $idKehadiran
            ])->with(['mahasiswa'])->get();
            
        return view('dosen.kehadiran.detail', $data);
    }

    public function absen(Request $request, $idKehadiran){
        $kehadiranDetail = KehadiranDetail::where([
            'id_kehadiran' => $idKehadiran
        ])->get();

        foreach ($kehadiranDetail as $i => $detail) {
            KehadiranDetail::where([
                'id_mahasiswa' => $detail->id_mahasiswa,
                'id_kehadiran' => $idKehadiran,
            ])->update([
                'status' => $request->status[$i]
            ]);
        }
        alert()->success('Absensi berhasil');
        return redirect('dosen/kehadiran/'.$idKehadiran);
    }
}
