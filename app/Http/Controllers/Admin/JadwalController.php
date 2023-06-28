<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Jadwal;
use App\Models\MataKuliahEnroll;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;


class JadwalController extends Controller
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
        $perPage = 25;
        $jadwal = Jadwal::latest()->with(['mataKuliahEnroll.mataKuliah'])->paginate($perPage);
        $data['mataKuliah'] = MataKuliahEnroll::with(['mataKuliah', 'kelas'])->get()->map(function($matkul, $key){
            return [
                $key => [$matkul->id, $matkul->kelas->nama_kelas . ' ' . $matkul->mataKuliah->nama_mata_kuliah, $matkul->mataKuliah->id_prodi],
            ] ;
        })->collapse();


        $data['matkul'] = array();
        foreach ($data['mataKuliah'] as $row) {
            if($row[2] == auth()->user()->id_prodi){
                continue;
            }
            $data['matkul'][$row[0]] = $row[1];
        }
        $data['jadwal'] = $jadwal;

        return view('admin.jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.jadwal.create');
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

        Jadwal::create($requestData);
        alert()->success('New ' . 'Jadwal'. ' Created!' );

        return redirect('admin/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return view('admin.jadwal.show', compact('jadwal'));
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
        $jadwal = Jadwal::findOrFail($id);
        $data['jadwal'] = $jadwal;
        $data['mataKuliah'] = MataKuliahEnroll::with(['mataKuliah', 'kelas'])->get()->map(function($matkul, $key){
            return [
                $key => [$matkul->id, $matkul->kelas->nama_kelas . ' ' . $matkul->mataKuliah->nama_mata_kuliah],
            ] ;
        })->collapse();

        $data['matkul'] = array();
        foreach ($data['mataKuliah'] as $row) {
            $data['matkul'][$row[0]] = $row[1];
        }
        return view('admin.jadwal.edit', $data);
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

        $jadwal = Jadwal::findOrFail($id);
        alert()->success('Record Updated!' );
        $jadwal->update($requestData);

        return redirect('admin/jadwal');
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
        Jadwal::destroy($id);

        return redirect('admin/jadwal');
    }
}
