<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengumuman')->insert([
            ['sumber' => 'BEM', 'judul' => 'Festival Seni Budaya 2024', 'deskripsi' => 'Kegiatan tahunan...', 'created_at' => now(), 'updated_at' => now()],
            ['sumber' => 'INFO', 'judul' => 'Ret-Reat Gelombang 2', 'deskripsi' => 'Ret-ret mahasiswa...', 'created_at' => now(), 'updated_at' => now()],
            ['sumber' => 'BURSAR', 'judul' => 'Pembayaran Bursar', 'deskripsi' => 'Pembayaran semester...', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
