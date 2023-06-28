<?php

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ta = [
            [
                'tahun' => 2022,
                'semester' => 1
            ],
            [
                'tahun' => 2023,
                'semester' => 2
            ]
        ];

        TahunAjaran::insert($ta);
    }
}
