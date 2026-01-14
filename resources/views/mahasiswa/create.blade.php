@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Mahasiswa</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-2">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="mb-2">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="mb-2">
                <label class="form-label">Angkatan</label>
                <input type="number" name="angkatan" class="form-control" placeholder="Contoh: 2025">
            </div>

            <div class="mb-2">
                <label class="form-label">Prodi</label>
                <select name="prodi_id" class="form-select">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($prodis as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Dosen Pembimbing</label>
                <select name="dosen_id" class="form-select">
                    <option value="">-- Pilih Dosen Pembimbing --</option>
                    @foreach($dosens as $d)
                        <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                    @endforeach
                </select>
            </div>

            <!-- TAMBAHAN FOTO -->
            <div class="mb-3">
                <label class="form-label">Foto Mahasiswa</label>
                <input type="file" name="foto" class="form-control">
                <small class="text-muted">Format: JPG, JPEG, PNG (Max 2MB)</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
