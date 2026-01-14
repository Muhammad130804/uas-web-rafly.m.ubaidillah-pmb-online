<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin PMB',
            'email' => 'admin@pmb.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Contoh akun mahasiswa
        User::create([
            'name' => 'Mahasiswa PMB',
            'email' => 'mahasiswa@pmb.com',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa'
        ]);
    }
}
