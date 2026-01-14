@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Mahasiswa</h5>
        <button class="btn btn-success btn-sm" id="btnTambah">
            + Tambah
        </button>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="mahasiswaTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mahasiswaModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="modalContent"></div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(function(){
    let table = $('#mahasiswaTable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('mahasiswa.ajax') }}",
        columns:[
            {data:'foto',orderable:false,searchable:false},
            {data:'nim'},
            {data:'nama'},
            {data:'prodi.nama_prodi'},
            {data:'dosen.nama_dosen'},
            {data:'aksi',orderable:false,searchable:false}
        ]
    });

    $('#btnTambah').click(function(){
        $.get("{{ route('mahasiswa.create') }}", function(res){
            $('#modalContent').html(res);
            $('#mahasiswaModal').modal('show');
        });
    });

    $(document).on('click','.btn-edit',function(){
        let id = $(this).data('id');
        $.get('/mahasiswa/'+id+'/edit',function(res){
            $('#modalContent').html(res);
            $('#mahasiswaModal').modal('show');
        });
    });

    $(document).on('click','.btn-delete',function(){
        let id = $(this).data('id');
        if(confirm('Hapus data?')){
            $.ajax({
                url:'/mahasiswa/'+id,
                type:'POST',
                data:{
                    _token:"{{ csrf_token() }}",
                    _method:"DELETE"
                },
                success:function(res){
                    alert(res.message);
                    table.ajax.reload();
                }
            });
        }
    });
});
</script>
@endpush
