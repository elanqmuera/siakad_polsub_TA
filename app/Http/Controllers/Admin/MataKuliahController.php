<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Kela;
use App\Models\MataKuliah;
use App\Models\MataKuliahEnroll;
use App\Models\ProgramStudi;
use App\User;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
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
        $matakuliah = MataKuliah::latest()->paginate($perPage);
        $data['matakuliah'] = $matakuliah;
        $data['prodi'] = ProgramStudi::pluck('nama_prodi', 'id');
        return view('admin.mata-kuliah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mata-kuliah.create');
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

        MataKuliah::create($requestData);
        alert()->success('New ' . 'MataKuliah'. ' Created!' );

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
        $data['matakuliah'] = MataKuliah::findOrFail($id);
        $data['enrolledMataKuliah'] = MataKuliahEnroll::where(['id_mata_kuliah'=> $id])->with(['dosen', 'kelas'])->get();
        $data['dosen'] = User::where(['id_role' => 2, 'id_prodi' => $data['matakuliah']->id_prodi])->pluck('name', 'id');
        $data['kelas'] = Kela::where([
            'id_prodi' => $data['matakuliah']->id_prodi,
        ])->pluck('nama_kelas', 'id');
        return view('admin.mata-kuliah.show', $data);
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
        $matakuliah = MataKuliah::where(['id' => $id])->with(['prodi'])->first();
        $data['matakuliah'] = $matakuliah;
        $data['prodi'] = ProgramStudi::pluck('nama_prodi', 'id');
        return view('admin.mata-kuliah.edit', $data);
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

        $matakuliah = MataKuliah::findOrFail($id);
        alert()->success('Record Updated!' );
        $matakuliah->update($requestData);

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
        MataKuliah::destroy($id);

        return redirect('admin/mata-kuliah');
    }
}
