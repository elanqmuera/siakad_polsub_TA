<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_name' => 'admin'
            ],
            [
                'role_name' => 'dosen'
            ],
            [
                'role_name' => 'mahasiswa'
            ],
            [
                'role_name' => 'wali'
            ],
        ];

        Role::insert($roles);
    }
}
