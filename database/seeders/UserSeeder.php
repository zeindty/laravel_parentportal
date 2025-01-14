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
        // Menggunakan DB::table untuk memasukkan data langsung
        DB::table('users')->insert([
            'name' => 'Zein Dity Aulia',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'), // Pastikan untuk mengenkripsi password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan lebih banyak data jika diperlukan
        // DB::table('users')->insert([
        //     'name' => 'Jane Doe',
        //     'email' => 'janedoe@example.com',
        //     'password' => Hash::make('password456'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
