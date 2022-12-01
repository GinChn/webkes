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
    {{-- <button id="container">Tekan</button> --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="/user/tambah-bmi" class="btn btn-success">Tambah BMI</a> --}}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        Tambah BMI
                    </button>
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
                                    <a href="#" class="btn-sm btn-danger delete" data-id="{{ $row->id_bmi }}">Hapus</a>
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

{{---------------------- Modal Tambah ----------------------------}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah BMI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" value="{{ $data->jenis_kelamin }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Usia</label>
                            <input type="text" class="form-control" name="usia" value="{{ $data->usia }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Berat Badan</label>
                            <input type="text" class="form-control" name="bb" placeholder="Masukkan Berat Badan" required>
                        </div>
                        <div class="form-group">
                            <label>Tinggi Badan</label>
                            <input type="text" class="form-control" name="tb" placeholder="Masukkan Tinggi Badan" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
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

        document.getElementById('save').onclick = function () {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil tersimpan',
                showConfirmButton: false,
                timer: 1500
            })
        }


        // document.getElementById('container').onclick = function () {
        //     var animation = bodymovin.loadAnimation({
        //     container: document.getElementById('container'),
        //     path: "https://assets7.lottiefiles.com/private_files/lf30_wafptztg.json",
        //     renderer: 'svg',
        //     loop: false,
        //     autoplay: true,
        // });
        // }
    })
</script>

@endsection