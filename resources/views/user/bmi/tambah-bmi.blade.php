@extends('user.layout')

@section('content')
    
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah BMI</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" mt-5>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data BMI</h3>
                </div>
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" value="{{ session('auth')->nik }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Berat Badan</label>
                            <input type="text" class="form-control" name="bb" placeholder="Masukkan Berat Badan" required>
                        </div>
                        <div class="form-group">
                            <label>Tinggi Badan</label>
                            <input type="text" class="form-control" name="tb" placeholder="Masukkan Tinggi Badan" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary simpan" id="save">Simpan</button>
                        <a href="/user/bmi" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script>
    $('.simpan').click( function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
        })
</script> --}}

{{-- Loties --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>
  <script>
    // var slideSource = document.getElementById('slideSource');

    document.getElementById('save').onclick = function () {
        Swal.fire({
            position: 'center',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            title: 'Data berhasil tersimpan',
            showConfirmButton: false,
            timer: 1500
        })
    }

//     var animation = bodymovin.loadAnimation({
//     container: document.getElementById('save'),
//     path: 'https://assets4.lottiefiles.com/private_files/lf30_wafptztg.json',
//     renderer: 'svg',
//     loop: true,
//     autoplay: true,
//   });
    
//     const play = document.querySelecttor('button');
//     const saveContainer = document.getElementById('save');
//     const animItem = bodymovin.loadAnimation({
//       wrapper: saveContainer,
//       animType: 'svg',
//       loop: true,
//       autoplay: true,
//       path: 'https://assets4.lottiefiles.com/private_files/lf30_wafptztg.json'
//     });

//     play.addEventListener('click' () => {
//       animItem.play();
//     });

  </script>

@endsection
