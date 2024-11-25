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

        for ($i = 1; $i <= 50; $i++) {
            $nim = 11416000 + $i; // Generate NIM from 11416001 to 11416050
            $users[] = [
                'username' => 'user' . $i,
                'password' => Hash::make('password'), // Hash password
                'nim' => $nim,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users); // Insert data into the 'users' table
    }
}
