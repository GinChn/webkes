@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrasi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/admin/tambah-user" class="btn btn-primary">Tambah User</a>
                    </div>
                    <div class="card-body">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->level_name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn-sm btn-danger delete" data-id="{{ $item->nik }}">Hapus</a>
                                        </td>
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

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $('.delete').click( function(){
            var nik = $(this).attr('data-id');
            Swal.fire({
            title: 'Yakin?',
            text: "Hapus User ini",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "hapus-user/"+nik+""
                Swal.fire(
                'Terhapus!',
                'Data berhasil terhapus',
                'success'
                )
            }
        })
    })

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    @if(Session::has('sukses'))
    Toast.fire({
            icon: 'success',
            title: '{{ Session::get('sukses') }}'
        })
    @endif
    })
</script>
@endsection
