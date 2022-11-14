@extends('admin.layout')

@section('content')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">

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
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control"  placeholder="Masukkan NIK" value="{{ $profile->nik }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ $profile->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="custom-select rounded-0" name="jk">
                                <option>Pilih Jenis Kelamin</option>
                                <option @if($profile->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                <option @if($profile->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="date" name="tl" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $profile->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usia</label>
                            <input type="text" name="usia" class="form-control" placeholder="Masukkan Usia" value="{{ $profile->usia }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/profile" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- InputMask -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
$(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    })
</script>

@endsection