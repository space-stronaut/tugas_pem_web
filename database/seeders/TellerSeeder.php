<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Teller',
            'email' => 'teller@gmail.com',
            'password' => bcrypt(123456),
            'role' => 'teller'
        ]);
    }
}
