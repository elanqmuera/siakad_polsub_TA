<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Perwalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelasEnroll;

class PerwalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {

    }

    public function index()
    {
        if(session()->get('is_wali')){
            return abort(403);
        }
        $data['kelas'] = KelasEnroll::where(['id_mahasiswa' => auth()->user()->id])->with(['kelas', 'kelas.dosenWali'])->get();
        return view ('mahasiswa.perwalian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idKelas' => 'required',
            'keluhan' => 'required'
        ]);

        Perwalian::create([
            'id_kelas' => $request->idKelas,
            'id_mahasiswa' => auth()->user()->id,
            'keluhan' => $request->keluhan
        ]);

        alert()->success('Berhasil mengajukan bimbingan' );

        return redirect('mahasiswa/perwalian/'. $request->idKelas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function show($idKelas)
    {
        $data['keluhan'] = Perwalian::where([
            'id_kelas' => $idKelas,
            'id_mahasiswa' => auth()->user()->id,
        ])->latest()->get();

        $data['idKelas'] = $idKelas;
        return view('mahasiswa.perwalian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Perwalian $perwalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perwalian $perwalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perwalian $perwalian)
    {
        //
    }
}
