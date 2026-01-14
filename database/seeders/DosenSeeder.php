<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosens = [
            ['nidn' => '00112233', 'nama_dosen' => 'Dr. Andi Saputra, M.Kom'],
            ['nidn' => '00112234', 'nama_dosen' => 'Dra. Siti Aisyah, M.M'],
            ['nidn' => '00112235', 'nama_dosen' => 'Ir. Budi Santoso, M.T'],
            ['nidn' => '00112236', 'nama_dosen' => 'Rina Marlina, S.Kom, M.Kom'],
            ['nidn' => '00112237', 'nama_dosen' => 'Ahmad Fauzi, S.T, M.T'],
            ['nidn' => '00112238', 'nama_dosen' => 'Dewi Lestari, S.E, M.M'],
            ['nidn' => '00112239', 'nama_dosen' => 'Hendra Gunawan, S.Kom, M.Kom'],
        ];

        foreach ($dosens as $dosen) {
            Dosen::create($dosen);
        }
    }
}
