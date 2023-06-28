<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
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
        $tahunajaran = TahunAjaran::latest()->paginate($perPage);
        $data['tahunajaran'] = $tahunajaran;
        return view('admin.tahun-ajaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tahun-ajaran.create');
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
            'tahun' => 'required',
            'semester' => 'required',
        ]);

        $requestData = $request->all();

        TahunAjaran::create($requestData);
        alert()->success('New ' . 'TahunAjaran'. ' Created!' );

        return redirect('admin/tahun-ajaran');
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
        $tahunajaran = TahunAjaran::findOrFail($id);

        return view('admin.tahun-ajaran.show', compact('tahunajaran'));
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
        $tahunajaran = TahunAjaran::findOrFail($id);
        $data['tahunajaran'] = $tahunajaran;
        return view('admin.tahun-ajaran.edit', $data);
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
            'tahun' => 'required',
            'semester' => 'required',
        ]);

        $requestData = $request->all();

        $tahunajaran = TahunAjaran::findOrFail($id);
        alert()->success('Record Updated!' );
        $tahunajaran->update($requestData);

        return redirect('admin/tahun-ajaran');
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
        TahunAjaran::destroy($id);

        return redirect('admin/tahun-ajaran');
    }
}
