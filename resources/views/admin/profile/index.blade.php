@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/assets/dist/img/user4-128x128.jpg" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center mb-3 mt-3">Nina Mcintire</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Berat Badan</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tinggi Badan</b> <a class="float-right">543</a>
                        </li>
                    </ul>
                    <a href="/edit-profile" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Profile</h3>
            </div>
            <div class="card-body">
                <strong>NIK</strong>
                <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                <hr>
                <strong>Nama Lengkap</strong>
                <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                <hr>
                <strong>Jenis Kelamin</strong>
                <p class="text-muted">Malibu, California</p>
                <hr>
                <strong>Tanggal Lahir</strong>
                <p class="text-muted">Malibu, California</p>
                <hr>
                <strong>Usia</strong>
                <p class="text-muted">Malibu, California</p>
            </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

@endsection