<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $prodis = [
            ['nama_prodi' => 'Teknik Informatika'],
            ['nama_prodi' => 'Sistem Informasi'],
            ['nama_prodi' => 'Manajemen Informatika'],
            ['nama_prodi' => 'Teknik Komputer'],
            ['nama_prodi' => 'Rekayasa Perangkat Lunak'],
            ['nama_prodi' => 'Manajemen'],
            ['nama_prodi' => 'Akuntansi'],
            ['nama_prodi' => 'Ilmu Komunikasi'],
        ];

        foreach ($prodis as $prodi) {
            Prodi::create($prodi);
        }
    }
}
