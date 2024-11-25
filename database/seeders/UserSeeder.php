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
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'), // Password untuk admin
            'nim' => 'admin',
            'role' => 'admin', // Role admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $users = [];
        $batches = [
            ['start' => 11417000, 'count' => 50], // Batch 2
            ['start' => 11418000, 'count' => 50], // Batch 3
            ['start' => 11419000, 'count' => 50], // Batch 3
            ['start' => 11420000, 'count' => 50], // Batch 3

        ];

        foreach ($batches as $batch) {
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


        DB::table('users')->insert($users); // Insert data into the 'users' table
    }
}
