<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\KehadiranDetail;
use Illuminate\Http\Request;

class KehadiranDetailController extends Controller
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
        $kehadirandetail = KehadiranDetail::latest()->paginate($perPage);
        $data['kehadirandetail'] = $kehadirandetail;
        return view('admin.kehadiran-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kehadiran-detail.create');
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
        
        KehadiranDetail::create($requestData);
        alert()->success('New ' . 'KehadiranDetail'. ' Created!' );

        return redirect('admin/kehadiran-detail');
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
        $kehadirandetail = KehadiranDetail::findOrFail($id);

        return view('admin.kehadiran-detail.show', compact('kehadirandetail'));
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
        $kehadirandetail = KehadiranDetail::findOrFail($id);
        $data['kehadirandetail'] = $kehadirandetail;
        return view('admin.kehadiran-detail.edit', $data);
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
        
        $kehadirandetail = KehadiranDetail::findOrFail($id);
        alert()->success('Record Updated!' );
        $kehadirandetail->update($requestData);

        return redirect('admin/kehadiran-detail');
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
        KehadiranDetail::destroy($id);

        return redirect('admin/kehadiran-detail');
    }
}
