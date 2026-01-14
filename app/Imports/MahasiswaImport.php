<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MahasiswaImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $prodi = Prodi::firstOrCreate([
            'nama_prodi' => $row['prodi']
        ]);

        $dosen = Dosen::firstOrCreate([
            'nama_dosen' => $row['dosen_pembimbing']
        ]);

        return new Mahasiswa([
            'nim'       => $row['nim'],
            'nama'      => $row['nama'],
            'angkatan'  => $row['angkatan'],
            'prodi_id'  => $prodi->id,
            'dosen_id'  => $dosen->id,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nim' => ['required', Rule::unique('mahasiswas','nim')],
            '*.nama' => ['required'],
            '*.angkatan' => ['required','numeric'],
            '*.prodi' => ['required'],
            '*.dosen_pembimbing' => ['required'],
        ];
    }
}
