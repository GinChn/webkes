@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table2" class="table table-bordered table-striped">
                            <a href="{{ route('export-admin') }}" class="btn btn-success">Excel</a>

                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jumlah Langkah</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $lap)
                                    <tr>
                                        <td>{{ $lap->nik }}</td>
                                        <td>{{ $lap->nama }}</td>
                                        <td>{{ $lap->langkah }}</td>
                                        <td>{{ date('d F Y', strtotime($lap->created_at)) }}</td>
                                        <td>
                                            <a href="/admin/detail-laporan/{{ $lap->id_laporan }}"
                                                class="btn btn-info btn-sm">Detail</a>
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
