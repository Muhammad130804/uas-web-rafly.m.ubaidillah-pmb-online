<form id="formMahasiswa" enctype="multipart/form-data">
    @csrf
    @if(isset($mahasiswa))
        @method('PUT')
    @endif

    <input type="hidden" id="formAction"
        value="{{ isset($mahasiswa)
            ? route('mahasiswa.update', $mahasiswa->id)
            : route('mahasiswa.store') }}">

    <div class="mb-2">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control"
               value="{{ $mahasiswa->nim ?? '' }}" required>
    </div>

    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control"
               value="{{ $mahasiswa->nama ?? '' }}" required>
    </div>

    <div class="mb-2">
        <label>Angkatan</label>
        <input type="number" name="angkatan" class="form-control"
               value="{{ $mahasiswa->angkatan ?? '' }}" required>
    </div>

    <div class="mb-2">
        <label>Prodi</label>
        <select name="prodi_id" class="form-control" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}"
                    {{ isset($mahasiswa) && $mahasiswa->prodi_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Dosen</label>
        <select name="dosen_id" class="form-control" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($dosens as $d)
                <option value="{{ $d->id }}"
                    {{ isset($mahasiswa) && $mahasiswa->dosen_id == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_dosen }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">
            💾 Simpan
        </button>
    </div>
</form>

<script>
/*
 Karena form ini dimuat lewat AJAX ke dalam modal,
 event harus pakai $(document).on()
*/
$(document).on('submit', '#formMahasiswa', function(e){
    e.preventDefault();

    let formData = new FormData(this);
    let action = $('#formAction').val();

    $.ajax({
        url: action,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(res){
            if(res.status){
                alert(res.message);
                $('#mahasiswaModal').modal('hide');
                $('#mahasiswaTable').DataTable().ajax.reload();
            }else{
                alert("Gagal: " + res.message);
            }
        },
        error: function(xhr){
            console.log(xhr.responseText);

            if(xhr.status == 422){
                let errors = xhr.responseJSON.errors;
                let pesan = "";
                for (let key in errors) {
                    pesan += errors[key][0] + "\n";
                }
                alert(pesan);
            } else {
                alert("Terjadi kesalahan server.");
            }
        }
    });
});
</script>
