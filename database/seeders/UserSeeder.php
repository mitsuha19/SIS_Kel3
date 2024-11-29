<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        // Akun admin
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'), // Password untuk admin
            'nim' => 'admin',
            'role' => 'admin', // Role admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $users = [];

        // Batch untuk NIM 114xxx
        $batches114 = [
            ['start' => 11417000, 'count' => 50],
            ['start' => 11418000, 'count' => 50],
            ['start' => 11419000, 'count' => 50],
            ['start' => 11420000, 'count' => 50],
        ];

        foreach ($batches114 as $batch) {
            for ($i = 1; $i <= $batch['count']; $i++) {
                $nim = $batch['start'] + $i; // Generate NIM
                $users[] = [
                    'username' => 'user' . $nim, // Unique username
                    'password' => Hash::make('password'), // Hash password
                    'nim' => $nim,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Batch untuk NIM 11Sxxx
        $batches11S = [
            ['start' => 11017000, 'count' => 50], // Batch untuk awalan 11S
            ['start' => 11018000, 'count' => 50],
            ['start' => 11019000, 'count' => 50],
        ];

        foreach ($batches11S as $batch) {
            for ($i = 1; $i <= $batch['count']; $i++) {
                $nim = $batch['start'] + $i; // Generate NIM dengan awalan 11S
                $users[] = [
                    'username' => 'user11S' . $nim, // Unique username
                    'password' => Hash::make('password'), // Hash password
                    'nim' => '11S' . substr($nim, 3), // Format NIM sebagai 11Sxxx
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan semua data ke dalam tabel 'users'
        DB::table('users')->insert($users);
    }
}
