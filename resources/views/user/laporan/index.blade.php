@extends('user.layout')

@section('content')
    @if (Session::has('alert'))
        @foreach (Session::get('alert') as $notif)
            <div class="alert alert-{{ $notif['type'] }}">{{ $notif['text'] }}</div>
        @endforeach
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Langkah</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if ($visible)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                Tambah Data
                            </button>
                        @else
                            <code><b>Kamu sudah menambahkan data hari ini, Tanggal {{ $last_date }}</b></code><br />
                        @endif
                        <a href="{{ route('export') }}" class="btn btn-success">Excel</a>
                    </div>
                    <div class="card-body">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Langkah</th>
                                    <th>Foto Langkah</th>
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
                                            <a href="/user/detail-laporanuser/{{ $lap->id_laporan }}"
                                                class="btn btn-warning btn-sm">Detail</a>
                                            <a href="#" class="btn btn-danger btn-sm hapus"
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
                                <input type="text" class="form-control" name="jumlah_langkah"
                                    placeholder="Jumlah Langkah" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Upload Bukti</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo_bukti"
                                    placeholder="Upload Bukti" required>
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

@section('script')
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
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
        })
    </script>
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
            @if (Session::has('sukses'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('sukses') }}'
                })
            @endif
            @if (Session::has('gagal'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('gagal') }}'
                })
            @endif
        });
    </script>
@endsection
