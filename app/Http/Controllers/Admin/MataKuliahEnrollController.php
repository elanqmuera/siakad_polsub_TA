<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Kela;
use App\Models\MataKuliahEnroll;
use App\User;
use Illuminate\Http\Request;

class MataKuliahEnrollController extends Controller
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
        $matakuliahenroll = MataKuliahEnroll::latest()->paginate($perPage);
        $data['matakuliahenroll'] = $matakuliahenroll;
        return view('admin.mata-kuliah-enroll.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mata-kuliah-enroll.create');
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

        $request->validate([
            'id_kelas_enroll'=>'required',
            'id_mata_kuliah' => 'required',
            'id_dosen' => 'required'
        ]);

        MataKuliahEnroll::create([
            'id_kelas_enroll' => $request->id_kelas_enroll,
            'id_mata_kuliah' => $request->id_mata_kuliah,
            'id_dosen' => $request->id_dosen
        ]);
        alert()->success('New ' . 'Enroll Mata Kuliah'. ' Created!' );

        return redirect('admin/mata-kuliah');
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
        $matakuliahenroll = MataKuliahEnroll::where('id', $id)->with(['kelas', 'mataKuliah', 'dosen'])->first();

        return view('admin.mata-kuliah-enroll.show', compact('matakuliahenroll'));
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
        $matakuliahenroll = MataKuliahEnroll::where('id', $id)->with(['mataKuliah'])->first();
        $data['matakuliah'] = $matakuliahenroll;
        // dd($matakuliahenroll);
        $data['kelas'] = Kela::where([
            'id_prodi' => $data['matakuliah']->mataKuliah->id_prodi,
        ])->pluck('nama_kelas', 'id');
        $data['dosen'] = User::where(['id_role' => 2, 'id_prodi' => $data['matakuliah']->mataKuliah->id_prodi])->pluck('name', 'id');
        return view('admin.mata-kuliah-enroll.edit', $data);
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
        $request->validate([
            'id_dosen' => 'required',
            'id_kelas_enroll' => 'required'
        ]);

        $matakuliahenroll = MataKuliahEnroll::findOrFail($id);
        alert()->success('Record Updated!' );
        MataKuliahEnroll::where(['id' => $id])->update([
            'id_dosen' => $request->id_dosen,
            'id_kelas_enroll' => $request->id_kelas_enroll
        ]);

        return redirect('admin/mata-kuliah');
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
        MataKuliahEnroll::destroy($id);

        return redirect('admin/mata-kuliah');
    }
}
