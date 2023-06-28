<?php

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'nama_jurusan' => 'Teknologi Industri'
            ],
            [
                'nama_jurusan' => 'Sains'
            ],
            [
                'nama_jurusan' => 'Sosial'
            ],
        ];

        Jurusan::insert($jurusan);
    }
}
