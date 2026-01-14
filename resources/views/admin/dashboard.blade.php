@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Dashboard Admin PMB</h3>
            <p class="text-muted mb-0">
                Selamat datang, {{ auth()->user()->name }} 👋
            </p>
        </div>
        <span class="badge bg-primary fs-6">Admin Panel</span>
    </div>

    <!-- Statistik -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <span class="fs-1 text-primary">🎓</span>
                    </div>
                    <h6 class="text-muted">Total Mahasiswa</h6>
                    <h2 class="fw-bold">{{ \App\Models\Mahasiswa::count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <span class="fs-1 text-success">🏫</span>
                    </div>
                    <h6 class="text-muted">Total Prodi</h6>
                    <h2 class="fw-bold">{{ \App\Models\Prodi::count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <span class="fs-1 text-warning">👨‍🏫</span>
                    </div>
                    <h6 class="text-muted">Total Dosen</h6>
                    <h2 class="fw-bold">{{ \App\Models\Dosen::count() }}</h2>
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

                    <!-- CRUD -->
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">
                        📋 Kelola Mahasiswa
                    </a>
                    <a href="{{ route('prodi.index') }}" class="btn btn-success">
                        🏫 Kelola Prodi
                    </a>
                    <a href="{{ route('dosen.index') }}" class="btn btn-warning">
                        👨‍🏫 Kelola Dosen
                    </a>

                    <!-- PDF KRS -->
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">
                        🧾 Cetak KRS (PDF)
                    </a>

                    <!-- Export Excel -->
                    <a href="{{ route('mahasiswa.export') }}" class="btn btn-outline-success">
                        ⬇ Export Excel
                    </a>

                    <!-- Import Excel -->
                    <form action="{{ route('mahasiswa.import') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="d-inline-flex align-items-center gap-2">
                        @csrf
                        <input type="file"
                               name="file"
                               class="form-control form-control-sm"
                               style="width: 200px"
                               required>
                        <button class="btn btn-outline-primary">
                            ⬆ Import Excel
                        </button>
                    </form>

                    <!-- Refresh -->
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        🔄 Refresh
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Mahasiswa Terbaru -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    Mahasiswa Terbaru
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Mahasiswa::latest()->take(5)->get() as $mhs)
                            <tr>
                                <td>
                                    @if($mhs->foto)
                                        <img src="{{ asset('storage/'.$mhs->foto) }}"
                                             width="45" height="45"
                                             class="rounded-circle shadow"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->prodi->nama_prodi }}</td>
                                <td>{{ $mhs->dosen->nama_dosen }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
