<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KrsController extends Controller
{
    public function cetak($id)
    {
        $mahasiswa = Mahasiswa::with(['prodi','dosen'])->findOrFail($id);

        $qr = base64_encode(
            QrCode::format('png')->size(120)->generate(
                "KRS PMB ONLINE\n".
                "NIM: {$mahasiswa->nim}\n".
                "Nama: {$mahasiswa->nama}\n".
                "Prodi: {$mahasiswa->prodi->nama_prodi}"
            )
        );

        $pdf = PDF::loadView('krs.pdf', compact('mahasiswa','qr'))
                  ->setPaper('A4', 'portrait');

        return $pdf->stream('KRS_'.$mahasiswa->nim.'.pdf');
    }
}
