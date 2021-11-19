<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aldo',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456),
            'nis' => 11902211,
            'kelas_id' => 1,
            'role' => 'siswa'
        ]);
    }
}
