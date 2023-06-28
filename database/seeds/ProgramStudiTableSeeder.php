<?php

use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;

class ProgramStudiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
                'id_jurusan' => 1,
                'nama_prodi' => 'Teknik Elektro'
            ],
            [
                'id_jurusan' => 1,
                'nama_prodi' => 'Teknik Sipil'
            ],
            [
                'id_jurusan' => 2,
                'nama_prodi' => 'Kimia'
            ],
            [
                'id_jurusan' => 2,
                'nama_prodi' => 'Fisika'
            ],
            [
                'id_jurusan' => 3,
                'nama_prodi' => 'Psikologi'
            ],
            [
                'id_jurusan' => 3,
                'nama_prodi' => 'Manajemen'
            ],
        ];

        ProgramStudi::insert($prodi);
    }
}
