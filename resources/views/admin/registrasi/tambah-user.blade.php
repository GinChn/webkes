@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah User</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" mt-5>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Masukkan Data User</h3>
                </div>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="custom-select" name="level">
                                <option value="">Pilih Level</option>
                                @foreach ($level as $lvl)
                                <option value="{{ $lvl->id_level }}">{{ $lvl->level_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection