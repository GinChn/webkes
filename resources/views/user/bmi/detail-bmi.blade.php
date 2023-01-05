@extends('user.layout')

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
    <div class="col-12 col-sm-6">
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
                    <a href="/user/bmi" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="card card-danger card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Kalori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Disclaimer</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Aktivitas</th>
                                    <th style="width: 100px">Kalori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bmi as $item)
                                <tr>
                                    <td>Tidak pernah atau sangat jarang berolahraga</td>
                                    <td>{{ number_format((int)$item->hasil_bmr * 1.2) }} kkal</td>
                                </tr>
                                <tr>
                                    <td>Berolahraga ringan 1-3 hari seminggu</td>
                                    <td>{{ number_format((int)$item->hasil_bmr * 1.375) }} kkal</td>
                                </tr>
                                <tr>
                                    <td>Berolahraga intensitas sedang 3-5 hari seminggu</td>
                                    <td>{{ number_format((int)$item->hasil_bmr * 1.55) }} kkal</td>
                                </tr>
                                <tr>
                                    <td>Berolahraga intensitas berat 6-7 hari seminggu</td>
                                    <td>{{ number_format((int)$item->hasil_bmr * 1.725) }} kkal</td>
                                </tr>
                                <tr>
                                    <td>Berolahraga intensitas sangat berat 6-7 hari seminggu atau bekerja di bidang yang membutuhkan stamina dan fisik yang kuat</td>
                                    <td>{{ number_format((int)$item->hasil_bmr * 1.9) }} kkal</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        Jika Anda ingin menjaga berat badan, penting untuk mengetahui berapa banyak kalori yang Anda butuhkan per harinya, agar tubuh mampu melakukan fungsinya dalam beraktivitas sehari-hari. Anda perlu mengonsumsi makanan dan minuman dengan jumlah kalori harian yang sesuai dengan kebutuhan tubuh.
                        Misalnya, jika kebutuhan kalori harian 1950 kkal, pastikan Anda mengonsumsi makanan dan minuman yang sesuai dengan nilai kalori tersebut. Jangan lupa juga untuk menggunakan prinsip gizi seimbang. Dengan begitu, semua jenis gizi yang dibutuhkan tubuh akan terpenuhi dengan baik.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                        Hasil dari kalkulator BMR ini bukanlah sebuah alat diagnosis medis ataupun pengganti konsultasi dokter. Perlu diingat bahwa ada beberapa faktor yang memengaruhi hasil kalkulator BMR ini, dari usia, kondisi tubuh masing-masing, berat badan, tinggi badan, hingga aktivitas harian. Sebelum mengubah gaya hidup, pastikan Anda konsultasi dengan dokter terlebih dahulu.<br>
                        Mengetahui tingkat metabolik basal (BMR) merupakan langkah awal dalam menentukan target berat badan ideal dan nutrisi yang dibutuhkan. Jika Anda sedang menjaga asupan kalori, maka BMR dibutuhkan untuk menghitung TDEE agar dapat memperkirakan seberapa banyak kalori yang perlu dikonsumsi demi menurunkan berat badan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection