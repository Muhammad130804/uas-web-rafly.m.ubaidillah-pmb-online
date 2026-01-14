<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function ajaxData()
    {
        $data = Mahasiswa::with(['prodi','dosen'])->select('mahasiswas.*');

        return DataTables::of($data)
            ->addColumn('foto', function ($mhs) {
                if ($mhs->foto) {
                    return '<img src="'.asset('storage/'.$mhs->foto).'"
                        width="40" height="40"
                        class="rounded-circle"
                        style="object-fit:cover;">';
                }
                return '-';
            })
            ->addColumn('aksi', function ($mhs) {
                return '
                    <a href="'.route('mahasiswa.krs',$mhs->id).'"
                       target="_blank"
                       class="btn btn-sm btn-danger">
                       🧾 KRS
                    </a>

                    <button class="btn btn-sm btn-warning btn-edit"
                            data-id="'.$mhs->id.'">
                        ✏ Edit
                    </button>

                    <button class="btn btn-sm btn-secondary btn-delete"
                            data-id="'.$mhs->id.'">
                        🗑 Hapus
                    </button>
                ';
            })
            ->rawColumns(['foto','aksi'])
            ->make(true);
    }

    public function create()
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.form', compact('prodis','dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'       => 'required|unique:mahasiswas',
            'nama'      => 'required',
            'angkatan'  => 'required|numeric',
            'prodi_id'  => 'required|exists:prodis,id',
            'dosen_id'  => 'required|exists:dosens,id',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nim','nama','angkatan','prodi_id','dosen_id']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                                  ->store('foto_mahasiswa','public');
        }

        Mahasiswa::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodis = Prodi::all();
        $dosens = Dosen::all();

        return view('mahasiswa.form', compact('mahasiswa','prodis','dosens'));
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'       => 'required|unique:mahasiswas,nim,'.$mhs->id,
            'nama'      => 'required',
            'angkatan'  => 'required|numeric',
            'prodi_id'  => 'required|exists:prodis,id',
            'dosen_id'  => 'required|exists:dosens,id',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nim','nama','angkatan','prodi_id','dosen_id']);

        if ($request->hasFile('foto')) {
            if ($mhs->foto && Storage::disk('public')->exists($mhs->foto)) {
                Storage::disk('public')->delete($mhs->foto);
            }
            $data['foto'] = $request->file('foto')
                                  ->store('foto_mahasiswa','public');
        }

        $mhs->update($data);

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);

        if ($mhs->foto && Storage::disk('public')->exists($mhs->foto)) {
            Storage::disk('public')->delete($mhs->foto);
        }

        $mhs->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
