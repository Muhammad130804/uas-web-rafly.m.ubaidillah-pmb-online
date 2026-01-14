<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MahasiswaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Mahasiswa::with(['prodi','dosen'])->get();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Angkatan',
            'Prodi',
            'Dosen Pembimbing',
        ];
    }

    public function map($mhs): array
    {
        return [
            $mhs->nim,
            $mhs->nama,
            $mhs->angkatan,
            $mhs->prodi->nama_prodi,
            $mhs->dosen->nama_dosen,
        ];
    }
}
