@extends('user.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data laporan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="/user/input-laporan" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-lg">Tambah Data</a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                            Tambah Data
                        </button>
                        <a href="{{ route('export') }}" class="btn btn-success">Excel</a>
                    </div>
                    <div class="card-body">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Langkah</th>
                                    <th>Foto Langkah</th>
                                    <th>Foto Selfie Sebelum</th>
                                    <th>Foto Selfie Sesudah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $lap)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($lap->created_at)) }}</td>
                                        <td>{{ $lap->langkah }}</td>
                                        <td>
                                            <img src="{{ asset('foto/bukti/' . $lap->bukti_langkah) }}" alt=""
                                                height="50px" width="50px">
                                        </td>
                                        <td>
                                            <img src="{{ asset('foto/sebelum/' . $lap->selfie_sebelum) }}" alt=""
                                                height="50px" width="50px">
                                        </td>
                                        <td> <img src="{{ asset('foto/sesudah/' . $lap->selfie_sesudah) }}" alt=""
                                                height="50px" width="50px">
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger hapus"
                                                data-id="{{ $lap->id_laporan }}">Hapus</a>
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

    {{-- --------------------------------- INPUT LAPORAN ------------------------------------ --}}

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Langkah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Jumlah Langkah"
                                    name="jumlah_langkah">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Upload Bukti</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo_bukti">
                                <label class="custom-file-label">Pilih Photo</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Upload Foto Selfie
                                    Sebelum</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo_sebelum">
                                <label class="custom-file-label">Pilih Photo</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Upload Foto Selfie
                                    Sesudah</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo_sesudah">
                                <label class="custom-file-label">Pilih Photo</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success simpan" id="simpan">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('foot')
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();

            $('.hapus').click(function() {
                var laporanid = $(this).attr('data-id');
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
                        window.location = "hapus-data/" + laporanid + ""
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil terhapus',
                            'success'
                        )
                    }
                })
            })

            document.getElementById('simpan').onclick = function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        })
    </script>
@endsection
