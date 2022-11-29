@extends('user.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">BMI</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/user/tambah-bmi" class="btn btn-success">Tambah BMI</a>
                </div>
                <div class="card-body">
                    <table id="table2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bmi as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->berat_badan }} Kg</td>
                                <td>{{ $row->tinggi_badan }} Cm</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>
                                    <a href="/user/detail-bmi/{{ $row->id_bmi }}" class="btn-sm btn-warning">Detail</a>
                                    <button class="btn-sm btn-danger delete" data-id="{{ $row->id_bmi }}">Hapus</button>
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

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete').click( function(){
        var bmiid = $(this).attr('data-id');
        Swal.fire({
        title: 'Yakin?',
        text: "Hapus data ini",
        icon: 'warning',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "hapus-bmi/"+bmiid+""
            Swal.fire(
            'Terhapus!',
            'Data berhasil terhapus',
            'success'
            )
        }
        })
    })
</script>


@endsection