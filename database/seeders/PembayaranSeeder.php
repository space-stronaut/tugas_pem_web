<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembayaran::create([
            'nama_pembayaran' => 'DSP',
            'jumlah_pembayaran' => '3500000'
        ]);
    }
}
