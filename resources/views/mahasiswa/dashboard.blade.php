@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Dashboard Mahasiswa</h3>
            <p class="text-muted mb-0">
                Selamat datang, {{ auth()->user()->name }} 🎓
            </p>
        </div>
        <span class="badge bg-success fs-6">Mahasiswa Panel</span>
    </div>

    <!-- Informasi Utama -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="fs-1 mb-2">📚</div>
                    <h6 class="text-muted">Status Pendaftaran</h6>
                    <h5 class="fw-bold text-success">Aktif</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="fs-1 mb-2">🧑‍🎓</div>
                    <h6 class="text-muted">Role</h6>
                    <h5 class="fw-bold">{{ auth()->user()->role }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="fs-1 mb-2">⏰</div>
                    <h6 class="text-muted">Login Terakhir</h6>
                    <h6 class="fw-bold">{{ now()->format('d M Y, H:i') }}</h6>
                </div>
            </div>
        </div>

    </div>

    <!-- Menu Cepat -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Menu Cepat</h5>
                <div class="d-flex flex-wrap gap-2">

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        👤 Edit Profil
                    </a>

                    <!-- Cetak KRS sendiri -->
                    <a href="{{ route('mahasiswa.krs', auth()->user()->mahasiswa->id ?? 0) }}"
                       class="btn btn-danger">
                        🧾 Cetak KRS Saya
                    </a>

                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        🔄 Refresh
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Informasi Panduan -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white fw-bold">
                    Informasi Penting
                </div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li>Pastikan data diri kamu sudah benar di menu Profil.</li>
                        <li>Simpan akun dan password dengan baik.</li>
                        <li>Hubungi admin jika ada kesalahan data.</li>
                        <li>Pantau informasi PMB secara berkala.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
