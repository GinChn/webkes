@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="./assets/plugins/daterangepicker/daterangepicker.css">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Profile</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIK">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Jenis Kelamin</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                <option>Pilih Jenis Kelamin</option>
                                <option>Perempuan</option>
                                <option>Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Masukkan Tanggal Lahir">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usia</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Usia">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="submit" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $(function () {
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    })
    </script>

@endsection