<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;
use App\Models\Dosen;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'prodi_id',
        'dosen_id',
        'foto'   // WAJIB ditambahkan
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
