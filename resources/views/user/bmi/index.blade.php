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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
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
    @if(Session::has('gagal'))
    Toast.fire({
            icon: 'error',
            title: '{{ Session::get('gagal') }}'
        })
    @endif
});
</script>
@endsection