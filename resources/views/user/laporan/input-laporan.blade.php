@extends('user.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="card-title">INPUT DATA</h1>
                </div>
                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="NIK" name="nik">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Langkah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Langkah" name="langkah">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">Upload Bukti</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo">
                                            <label class="custom-file-label">Pilih Photo</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <button type="submit" class="btn btn-danger">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
