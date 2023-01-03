@extends('user.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Detail</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-4">
        <div class="col-md-8">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title ">Detail Laporan Langkah</h3>
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
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" value="{{ $lap->nik }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $lap->nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Langkah</label>
                            <input type="text" class="form-control" value="{{ $lap->langkah }}"" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control"
                                value="{{ date('d F Y', strtotime($lap->created_at)) }}" readonly>
                        </div>
                    @endforeach

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>



        <div class="col-md-4">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title ">Bukti Langkah</h3>
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
                                <img src="{{ asset('foto/bukti/' . $lap->bukti_langkah) }}" alt="" height="345px"
                                    width="410px">
                            </td>
                        </tr>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
            <a href="/user/data-laporan" class="btn btn-danger btn-block ">Close</a>
        </div>
    </div>
@endsection
