<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Buat Komunitas | FILCOM</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <x-navbar-2 nama="{{session()->get('nama')[0]}}" foto="{{session()->get('foto')[0]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>
      <div class="main-content">
        <section class="section">
          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                  <img src="{{asset('assets/img/logo6.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                  <p><br>Buat Komunitas</p>
                </div>
                @if ($errors->any())
                  <x-alert type="danger" title="Data tidak valid" msg="{{$errors->first()}}"></x-alert>
                @endif  
                <div class="card card-primary">
                  <div class="card-body">
                    <form action="{{route('createKomunitas.ketua')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-divider">
                        Tentang Komunitas
                      </div>
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="nama">Nama Komunitas</label>
                          <input id="nama" type="text" class="form-control" name="nama" autofocus>
                        </div>
                        <div class="form-group col-12">
                          <label>Jenis</label>
                          <select class="form-control selectric" name="jenis">
                            <option>LO</option>
                            <option>LSO</option>
                            <option>Komunitas</option>
                          </select>
                        </div>
                        <div class="form-group col-12">
                          <label for="alamat">Alamat Komunitas</label>
                          <input id="alamat" type="text" class="form-control" name="alamat" >
                        </div>
                        <div class="form-group col-12">
                          <label for="deskripsi">Deskripsi Singkat</label>
                          <textarea id="deskripsi" class="form-control" name="desc" ></textarea>
                        </div>
                      </div>
                      <div class="form-divider">
                        Kontak (Opsional)
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-6">
                          <label for="ig">Instagram</label>
                          <input id="ig" type="text" class="form-control" name="ig">
                        </div>
                        <div class="form-group col-6">
                          <label for="line">Line</label>
                          <input id="line" type="text" class="form-control" name="line">
                        </div>
                        <div class="form-group col-6">
                          <label for= "youtube">Youtube</label>
                          <input id="youtube" type="text" class="form-control" name="youtube">
                        </div>
                        <div class="form-group col-6">
                          <label for= "logo">Logo</label>
                          <input id="logo" type="file" class="form-control" name="logo">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                          <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                          Create
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <x-footer></x-footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/auth-register.js')}}"></script>
</body>
</html>
