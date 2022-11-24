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
                    <a href="/tambah-bmi" class="btn btn-success">Tambah BMI</a>
                </div>
                <div class="card-body">
                    <table id="table2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Usia</th>
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
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->usia }} Tahun</td>
                                <td>{{ $row->berat_badan }}</td>
                                <td>{{ $row->tinggi_badan }}</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>#</td>
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