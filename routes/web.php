<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\KrsController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


/*
|--------------------------------------------------------------------------
| Redirect Awal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Profile User
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Dashboard & Role Redirect
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('mahasiswa.dashboard');
        }
    })->name('dashboard');

    // Dashboard Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Dashboard Mahasiswa
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('mahasiswa.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
| - CRUD
| - AJAX DataTables
| - Import / Export Excel
| - Cetak KRS semua mahasiswa
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // AJAX Data Mahasiswa (Level 5)
    Route::get('/mahasiswa/data/ajax', [MahasiswaController::class, 'ajaxData'])
        ->name('mahasiswa.ajax');

    // EXPORT Excel (Level 6)
    Route::get('/mahasiswa/export', [ImportExportController::class, 'export'])
        ->name('mahasiswa.export');

    // IMPORT Excel (Level 6)
    Route::post('/mahasiswa/import', [ImportExportController::class, 'import'])
        ->name('mahasiswa.import');

    // CETAK KRS PDF (ADMIN - semua mahasiswa)
    Route::get('/mahasiswa/{id}/krs', [KrsController::class, 'cetak'])
        ->name('mahasiswa.krs');

    // CRUD (HARUS PALING BAWAH biar tidak bentrok)
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('dosen', DosenController::class);
});

/*
|--------------------------------------------------------------------------
| MAHASISWA AREA
|--------------------------------------------------------------------------
| - Cetak KRS milik sendiri
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/krs-saya', [KrsController::class, 'cetakSaya'])
        ->name('mahasiswa.krs.saya');
});

/*
|--------------------------------------------------------------------------
| TEST QR CODE (hapus nanti setelah berhasil)
|--------------------------------------------------------------------------
*/
Route::get('/test-qr', function () {
    return QrCode::size(200)->generate('PMB ONLINE QR TEST');
});


require __DIR__.'/auth.php';
