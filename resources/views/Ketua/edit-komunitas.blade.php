<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Komunitas | {{$komunitas->nama}}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

  <style>
    .name-ketua{
      font-size: 12px;
    }
    .profile{
      font-size: 12pt;
    }
  </style>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <x-navbar-2 nama="{{session()->get('nama')[0]}}" foto="{{session()->get('foto')[0]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Komunitas</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('showInfoKomunitas.anggota',[$komunitas->komunitasId])}}">Beranda Komunitas</a></div>
              <div class="breadcrumb-item">Edit Komunitas</div>
            </div>
          </div>
          @if($errors->any())
            <x-alert type="danger" title="Data tidak valid" msg="{{$errors->first()}}"></x-alert>
          @endif
          <div class="card card-primary">
            <div class="card-body">
              <form method="POST" action="{{route('updateKomunitas.ketua',[$komunitas->komunitasId])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-divider">
                  Tentang Komunitas
                  <a href="{{route('deleteKomunitas.ketua',[$komunitas->komunitasId])}}" class="badge badge-danger float-right">Hapus komunitas</a>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label for="username">Nama Komunitas</label>
                    <input id="username" type="text" class="form-control" name="nama" value ="{{$komunitas->nama}}" autofocus >
                  </div>
                  <div class="form-group col-6">
                    <label for="alamat">Alamat Komunitas</label>
                    <input id="alamat" type="text" class="form-control" name="alamat" value ="{{$komunitas->alamat}}" >
                  </div>
                  <div class="form-group col-6">
                    <label>Jenis Komunitas</label>
                    <select class="form-control selectric" name="jenis">
                      @foreach(['LO','LSO','Komunitas'] as $jenis)
                        @if($jenis==$komunitas->jenis)
                          <option selected="selected">{{$jenis}}</option>
                        @else
                          <option>{{$jenis}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-12">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <input id="deskripsi" type="textarea" class="form-control" name="desc" value ="{{$komunitas->deskripsi}}" >
                  </div>
                </div>
                <div class="form-divider">
                  Kontak (Opsional)
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value ="{{$komunitas->email??'-'}}">
                  </div>
                  <div class="form-group col-6">
                    <label for="telepon">Instagram</label>
                    <input id="telepon" type="text" class="form-control" name="ig" value ="{{$komunitas->ig??'-'}}">
                  </div>
                  <div class="form-group col-6">
                    <label for="line">Line</label>
                    <input id="line" type="text" class="form-control" name="line" value ="{{$komunitas->line??'-'}}">
                  </div>
                  <div class="form-group col-6">
                    <label for= "youtube">Youtube</label>
                    <input id="youtube" type="text" class="form-control" name="youtube" value ="{{$komunitas->youtube??'-'}}">
                  </div>
                  <div class="form-group col-6">
                    <label for= "logo">Logo</label>
                    <input id="logo" type="file" class="form-control" name="logoKom">
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    EDIT
                  </button>
                </div>
              </form>
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
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
