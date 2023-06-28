<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'identity_number' => '12341234',
                'id_role' => 1,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  1
            ],
            [
                'name' => 'Dosen 1',
                'email' => 'dosen1@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  1
            ],
            [
                'name' => 'Dosen 2',
                'email' => 'dosen2@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  1
            ],
            [
                'name' => 'Dosen 3',
                'email' => 'dosen3@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  2
            ],
            [
                'name' => 'Dosen 4',
                'email' => 'dosen4@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  2
            ],
            [
                'name' => 'Dosen 5',
                'email' => 'dosen5@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  3
            ],
            [
                'name' => 'Dosen 6',
                'email' => 'dosen6@dosen.com',
                'identity_number' => '12341234',
                'id_role' => 2,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  3
            ],
            [
                'name' => 'Mahasiswa 1',
                'email' => 'mahasiswa1@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  1
            ],
            [
                'name' => 'Mahasiswa 2',
                'email' => 'mahasiswa2@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  1
            ],
            [
                'name' => 'Mahasiswa 3',
                'email' => 'mahasiswa3@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  2
            ],
            [
                'name' => 'Mahasiswa 4',
                'email' => 'mahasiswa4@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  2
            ],
            [
                'name' => 'Mahasiswa 5',
                'email' => 'mahasiswa5@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  3
            ],
            [
                'name' => 'Mahasiswa 6',
                'email' => 'mahasiswa6@mahasiswa.com',
                'identity_number' => '12341234',
                'id_role' => 3,
                'password' => bcrypt('password'),
                'address' => 'alamat rumah',
                'phone_number' => '12341234',
                'gender' => 'Laki-Laki',
                'id_prodi' =>  3
            ],
        ];

        User::insert($users);
    }
}
