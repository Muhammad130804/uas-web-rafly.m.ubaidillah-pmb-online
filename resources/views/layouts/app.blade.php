<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PMB Online') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Style Tambahan -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
        .navbar {
            box-shadow: 0 2px 6px rgba(0,0,0,.1);
        }
        .card {
            border-radius: 12px;
        }
        .card-header {
            border-radius: 12px 12px 0 0;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #0d6efd, #084298);
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,.2);
        }
        .content-wrapper {
            padding: 20px;
        }
        table.dataTable tbody tr:hover {
            background-color: #f1f5ff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            🎓 PMB Online
        </a>

        <div class="d-flex align-items-center">
            @auth
                <span class="text-white me-3">
                    {{ auth()->user()->name }} ({{ auth()->user()->role }})
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h5 class="mb-3">Menu</h5>

            @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                <a href="{{ route('mahasiswa.index') }}">🎓 Mahasiswa</a>
                <a href="{{ route('prodi.index') }}">🏫 Prodi</a>
                <a href="{{ route('dosen.index') }}">👨‍🏫 Dosen</a>
            @else
                <a href="{{ route('mahasiswa.dashboard') }}">🏠 Dashboard</a>
            @endif
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10 content-wrapper">
            @yield('content')
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Tempat script halaman (AJAX, DataTables, dll) -->
@stack('scripts')

</body>
</html>
