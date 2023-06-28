<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Kela;
use App\Models\ProgramStudi;
use App\Models\TahunAjaran;
use App\User;
use Illuminate\Http\Request;

class KelasController extends Controller
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
        $kelas = Kela::latest()->with(['tahunAjaran', 'dosenWali', 'prodi'])->paginate($perPage);
        $data['kelas'] = $kelas;
        $data['program_studi'] = ProgramStudi::pluck('nama_prodi', 'id');
        $data['dosen_wali'] = User::where([
            'id_role' => 2
        ])->pluck('name', 'id');
        $data['tahun_ajaran'] = TahunAjaran::select(TahunAjaran::raw("CONCAT('Semester ', COALESCE(`semester`,''),' Tahun ',COALESCE(`tahun`,'')) AS nama_tahun"),'id')->pluck('nama_tahun', 'id');
        return view('admin.kelas.index', $data);
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
        $request->validate([
            'id_tahun_ajaran' => 'required',
            'nama_kelas' => 'required',
            'kode_kelas' => 'required',
            'id_dosen_wali' => 'required',
            'id_prodi' => 'required',
        ]);
        $requestData = $request->all();

        $dosen = User::where([
            'id' => $request->id_dosen_wali
        ])->first();

        if($dosen->id_prodi != $request->id_prodi){
            alert()->error('Dosen tidak sesuai dengan program studi');
            return redirect('admin/kelas');
        }

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
    public function show($id)
    {
        $kelas = Kela::findOrFail($id);

        return view('admin.kelas.show', compact('kelas'));
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

        $dosen = User::where([
            'id' => $request->id_dosen_wali
        ])->first();

        if($dosen->id_prodi != $request->id_prodi){
            alert()->error('Dosen tidak sesuai dengan program studi');
            return redirect('admin/kelas');
        }


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
