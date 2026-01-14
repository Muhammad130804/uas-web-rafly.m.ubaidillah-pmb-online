<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nim' => '20260001', 'nama' => 'Adam',        'angkatan' => 2026],
            ['nim' => '20260002', 'nama' => 'Adinda',      'angkatan' => 2026],
            ['nim' => '20260003', 'nama' => 'Aditia',      'angkatan' => 2026],
            ['nim' => '20260004', 'nama' => 'Arimbi',      'angkatan' => 2026],
            ['nim' => '20260005', 'nama' => 'Ajam',        'angkatan' => 2026],
            ['nim' => '20260006', 'nama' => 'Dini',        'angkatan' => 2026],
            ['nim' => '20260007', 'nama' => 'Ervi',        'angkatan' => 2026],
            ['nim' => '20260008', 'nama' => 'Fajar',       'angkatan' => 2026],
            ['nim' => '20260009', 'nama' => 'Farhan',      'angkatan' => 2026],
            ['nim' => '20260010', 'nama' => 'Febrian',     'angkatan' => 2026],
            ['nim' => '20260011', 'nama' => 'Finkka',      'angkatan' => 2026],
            ['nim' => '20260012', 'nama' => 'Fitri',       'angkatan' => 2026],
            ['nim' => '20260013', 'nama' => 'Ginanjar',    'angkatan' => 2026],
            ['nim' => '20260014', 'nama' => 'Hafiz',       'angkatan' => 2026],
            ['nim' => '20260015', 'nama' => 'Haris',       'angkatan' => 2026],
            ['nim' => '20260016', 'nama' => 'Iqbal',       'angkatan' => 2026],
            ['nim' => '20260017', 'nama' => 'Karyamah',    'angkatan' => 2026],
            ['nim' => '20260018', 'nama' => 'Listya',      'angkatan' => 2026],
            ['nim' => '20260019', 'nama' => 'Marsha',      'angkatan' => 2026],
            ['nim' => '20260020', 'nama' => 'Momo Ubay',   'angkatan' => 2026],
            ['nim' => '20260021', 'nama' => 'Nael',        'angkatan' => 2026],
            ['nim' => '20260022', 'nama' => 'Narginda',    'angkatan' => 2026],
            ['nim' => '20260023', 'nama' => 'Novelia',     'angkatan' => 2026],
            ['nim' => '20260024', 'nama' => 'Nurjaman',    'angkatan' => 2026],
            ['nim' => '20260025', 'nama' => 'Rafli A',     'angkatan' => 2026],
            ['nim' => '20260026', 'nama' => 'Rapi',        'angkatan' => 2026],
            ['nim' => '20260027', 'nama' => 'Rasya',       'angkatan' => 2026],
            ['nim' => '20260028', 'nama' => 'Ravan',       'angkatan' => 2026],
            ['nim' => '20260029', 'nama' => 'Reza',        'angkatan' => 2026],
            ['nim' => '20260030', 'nama' => 'Ridwan',      'angkatan' => 2026],
            ['nim' => '20260031', 'nama' => 'Salma',       'angkatan' => 2026],
            ['nim' => '20260032', 'nama' => 'Sandi',       'angkatan' => 2026],
            ['nim' => '20260033', 'nama' => 'Sayid',       'angkatan' => 2026],
            ['nim' => '20260034', 'nama' => 'Tria Intan',  'angkatan' => 2026],
            ['nim' => '20260035', 'nama' => 'Vera',        'angkatan' => 2026],
            ['nim' => '20260036', 'nama' => 'Viona Yusuf', 'angkatan' => 2026],
        ];

        /*
         * Asumsi:
         * - prodis dan dosens sudah ada datanya
         * - kita pakai prodi_id = 1
         * - kita pakai dosen_id = 1
         * (nanti bisa kamu ubah sesuai kebutuhan)
         */

        foreach ($data as $mhs) {
            Mahasiswa::firstOrCreate(
                ['nim' => $mhs['nim']], // supaya tidak dobel
                [
                    'nama'      => $mhs['nama'],
                    'angkatan'  => $mhs['angkatan'],
                    'prodi_id'  => 1,
                    'dosen_id'  => 1,
                    'foto'      => null
                ]
            );
        }
    }
}
