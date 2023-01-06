@extends('admin.layout')

@section('content')
    
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Detail BMI</h3>
            </div>
            <form>
                <div class="card-body">
                    @foreach ($bmi as $item)
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $item->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Berat Badan</label>
                        <input type="text" class="form-control" value="{{ $item->berat_badan }} Kg" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tinggi Badan</label>
                        <input type="text" class="form-control" value="{{ $item->tinggi_badan }} Cm" readonly>
                    </div>
                    <div class="form-group">
                        <label>Berat Massa Index</label>
                        <input type="text" class="form-control" value="{{ number_format((float)$item->hasil_bmi, 1, '.', '') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" value="{{ $item->keterangan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Berat Badan Ideal</label>
                        <input type="text" class="form-control" value="{{ number_format((float)$item->ideal, 1, '.', '') }} Kg" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ date('d F Y', strtotime($item->created_at)) }}" readonly>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <a href="/admin/bmi" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection