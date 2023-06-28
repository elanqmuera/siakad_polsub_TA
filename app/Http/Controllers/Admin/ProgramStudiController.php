<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Jurusan;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
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
        $programstudi = ProgramStudi::latest()->with(['jurusan'])->paginate($perPage);
        $data['programstudi'] = $programstudi;
        $data['jurusan'] = Jurusan::pluck('nama_jurusan', 'id');
        return view('admin.program-studi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.program-studi.create');
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

        ProgramStudi::create($requestData);
        alert()->success('New ' . 'ProgramStudi'. ' Created!' );

        return redirect('admin/program-studi');
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
        $programstudi = ProgramStudi::findOrFail($id);

        return view('admin.program-studi.show', compact('programstudi'));
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
        $programstudi = ProgramStudi::findOrFail($id);
        $data['jurusan'] = Jurusan::pluck('nama_jurusan', 'id');
        $data['programstudi'] = $programstudi;
        return view('admin.program-studi.edit', $data);
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

        $programstudi = ProgramStudi::findOrFail($id);
        alert()->success('Record Updated!' );
        $programstudi->update($requestData);

        return redirect('admin/program-studi');
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
        ProgramStudi::destroy($id);

        return redirect('admin/program-studi');
    }
}
