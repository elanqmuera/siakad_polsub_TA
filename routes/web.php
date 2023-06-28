<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/login');
});

Route::post('/sign-in', 'Auth\AuthController@loginUser')->name('sign-in');

Auth::routes();
Route::get('/sign-out', 'Auth\AuthController@userLogout')->name('sign-out');

// Admin
Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin',
        'as' => 'admin.',
    ], function(){
        Route::get('/', 'Admin\AdminController@index');
        Route::resource('jurusan', 'Admin\\JurusanController');
        Route::resource('role', 'Admin\\RoleController');
        Route::resource('tahun-ajaran', 'Admin\\TahunAjaranController');
        Route::resource('program-studi', 'Admin\\ProgramStudiController');
        Route::resource('mata-kuliah', 'Admin\\MataKuliahController');
        Route::resource('nilai', 'Admin\\NilaiController');
        Route::resource('kehadiran', 'Admin\\KehadiranController');
        Route::resource('kehadiran-detail', 'Admin\\KehadiranDetailController');
        Route::resource('jadwal', 'Admin\\JadwalController');
        Route::resource('mata-kuliah-enroll', 'Admin\\MataKuliahEnrollController');
        Route::resource('kelas', 'Admin\\KelasController');
        Route::resource('kelas-enroll', 'Admin\\KelasEnrollController');
        Route::resource('users', 'Admin\\UserController');
    });

    Route::group([
        'prefix' => 'dosen',
        'middleware' => 'dosen',
        'as' => 'dosen.',
    ], function(){
        Route::get('/', 'Dosen\DosenController@index');
        Route::resource('jadwal', 'Dosen\\JadwalController')->except('index');
        Route::resource('mata-kuliah', 'Dosen\\MataKuliahController');
        Route::get('perwalian/{idKelas}/mahasiswa/{idMahasiswa}', 'Dosen\\PerwalianController@showMatkulMahasiswa');
        Route::get('perwalian/{idKelas}/mahasiswa/{idMahasiswa}/nilai/{idMataKuliahEnroll}', 'Dosen\\PerwalianController@showNilaiMahasiswa');
        Route::resource('perwalian', 'Dosen\\PerwalianController');
        Route::post('kehadiran/{idJadwal}', 'Dosen\\KehadiranController@store');
        Route::get('kehadiran/{idKehadiran}', 'Dosen\\KehadiranController@show');
        Route::post('kehadiran-detail/{idKehadiran}', 'Dosen\\KehadiranController@absen');
        Route::post('daftar-nilai/{id}', 'Dosen\\NilaiController@storeDaftarNilai');
        Route::get('detail-nilai/{idDaftarNilai}', 'Dosen\\NilaiController@detailDaftarNilai');
        Route::post('detail-nilai/{idDaftarNilai}', 'Dosen\\NilaiController@storeDetailDaftarNilai');
        Route::resource('nilai', 'Dosen\\NilaiController');
    });

    Route::group([
        'prefix' => 'mahasiswa',
        'middleware' => 'mahasiswa',
        'as' => 'mahasiswa.',
    ], function(){
        Route::get('/', 'Mahasiswa\MahasiswaController@index');
        Route::resource('kelas', 'Mahasiswa\\KelasController');
        Route::resource('mata-kuliah', 'Mahasiswa\\MataKuliahController');
        Route::resource('nilai', 'Mahasiswa\\NilaiController');
        Route::resource('perwalian', 'Mahasiswa\\PerwalianController');
    });
});




