<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\KelasEnroll;
use Illuminate\Http\Request;

class KelasEnrollController extends Controller
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
        $kelasenroll = KelasEnroll::latest()->paginate($perPage);
        $data['kelasenroll'] = $kelasenroll;
        return view('admin.kelas-enroll.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kelas-enroll.create');
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
        
        KelasEnroll::create($requestData);
        alert()->success('New ' . 'KelasEnroll'. ' Created!' );

        return redirect('admin/kelas-enroll');
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
        $kelasenroll = KelasEnroll::findOrFail($id);

        return view('admin.kelas-enroll.show', compact('kelasenroll'));
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
        $kelasenroll = KelasEnroll::findOrFail($id);
        $data['kelasenroll'] = $kelasenroll;
        return view('admin.kelas-enroll.edit', $data);
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
        
        $kelasenroll = KelasEnroll::findOrFail($id);
        alert()->success('Record Updated!' );
        $kelasenroll->update($requestData);

        return redirect('admin/kelas-enroll');
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
        KelasEnroll::destroy($id);

        return redirect('admin/kelas-enroll');
    }
}
