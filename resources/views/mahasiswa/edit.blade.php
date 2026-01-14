@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">Edit Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST">
            @csrf @method('PUT')
            <input class="form-control mb-2" name="nim" value="{{ $mahasiswa->nim }}">
            <input class="form-control mb-2" name="nama" value="{{ $mahasiswa->nama }}">
            <input class="form-control mb-2" name="angkatan" value="{{ $mahasiswa->angkatan }}">
            <input class="form-control mb-2" name="prodi" value="{{ $mahasiswa->prodi }}">
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
