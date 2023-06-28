<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Alert;
use App\Models\Jurusan;
use App\Models\Kela;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data['prodi'] = ProgramStudi::count();
        $data['jurusan'] = Jurusan::count();
        $data['kelas'] = Kela::count();
        return view('admin.dashboard', $data);
    }


}
