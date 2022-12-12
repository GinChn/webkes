@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Laporan</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jumlah Langkah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $lap)
                                    <tr>
                                        <td>{{ $lap->nik }}</td>
                                        <td>{{ $lap->nama }}</td>
                                        <td>{{ $lap->langkah }}</td>
                                        <td>{{ date('d F Y', strtotime($lap->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-4">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Foto Langkah</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach ($laporan as $lap)
                        <tr>
                            <td>
                                <img src="{{ asset('foto/bukti/' . $lap->bukti_langkah) }}" alt="" height="400px"
                                    width="425px">
                            </td>
                        </tr>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Foto Selfie Sebelum</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <td>
                        <img src="{{ asset('foto/sebelum/' . $lap->selfie_sebelum) }}" alt="" height="400px"
                            width="425px">
                    </td>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Foto Selfie Sesudah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <td> <img src="{{ asset('foto/sesudah/' . $lap->selfie_sesudah) }}" alt="" height="400px"
                            width="425px">
                    </td>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <div class="mx-4">
        <a href="/admin/data-laporan" class="btn btn-danger btn-block " style="margin-bottom: 10px;">Close</a>
    </div>
@endsection
