<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nidn','nama_dosen'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
