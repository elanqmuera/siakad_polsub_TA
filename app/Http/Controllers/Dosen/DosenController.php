<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Perwalian;
use App\User;
use Illuminate\Http\Request;

class DosenController extends Controller
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
        $data['users'] = User::count();
        $data['totalKeluhan'] = Perwalian::join('kelas', 'perwalians.id_kelas', '=', 'kelas.id')
        ->join('users', 'kelas.id_dosen_wali', '=', 'users.id')
        ->where('users.id', auth()->user()->id)
        ->count();
        $data['totalKeluhanBelumdiBalas'] = Perwalian::join('kelas', 'perwalians.id_kelas', '=', 'kelas.id')
        ->join('users', 'kelas.id_dosen_wali', '=', 'users.id')
        ->where('users.id', auth()->user()->id)
        ->whereNull('perwalians.balasan')
        ->count();
        return view('dosen.dashboard', $data);
    }
}
