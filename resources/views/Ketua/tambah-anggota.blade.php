<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Tambah anggota | {{$komunitas->nama}}</title>

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
      <div class="navbar-bg"></div>
      <x-navbar-2 nama="{{session()->get('nama')[0]}}" foto="{{session()->get('foto')[0]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Anggota</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          @if($errors->any())
            <x-alert type="danger" title="Data tidak valid" msg="{{$errors->first()}}"></x-alert>
          @endif
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <form action="{{route('createAnggota.ketua',[$komunitas->komunitasId])}}" method="post"  enctype="multipart/form-data">
                  <div class="card-body">
                    @csrf
                    <div class="section-title mt-0">Data Diri</div>
                    <div class="row">
                        <div class="form-group col-12">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group col-6">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-6">
                          <label for="telepon">No Telepon</label>
                          <input type="tel" class="form-control phone-number" name="noTelp">
                        </div>
                        <div class="form-group col-6">
                          <label>Fakultas</label>
                          <select class="form-control selectric" name="fakultas">
                            @foreach($listFakultas as $fakultas)
                              <option>{{$fakultas}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for= "domisili">Domisili</label>
                          <input type="text" class="form-control" name="domisili">
                        </div>
                        <div class="form-group col-6">
                          <label for= "jenisK">Jenis Kelamin</label>
                          <select class="form-control selectric" name="jenisK">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for= "foto">Foto profil</label>
                          <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <div class="section-title mt-0">Data Keanggotaan</div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="nama">Jabatan</label>
                        <select class="form-control selectric" name="jabatan">
                          <option value="7">Anggota</option>
                          <option value="2">Wakil Ketua Komunitas</option>
                          <option value="3">Sekretaris Komunitas</option>
                          <option value="4">Bendahara Komunitas</option>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="nama">Divisi</label>
                        <select class="form-control selectric" name="divisi">
                          <option>-</option>
                          @foreach($listDivisi as $divisi)
                            <option value="{{$divisi->divisiId}}">{{$divisi->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-12">
                        <label for="nama">Deskripsi</label>
                        <input type="textarea" class="form-control" name="desc">
                      </div>
                    </div>
                    <div class="section-title mt-0">Sosial Media (Opsional)</div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="nama">Instagram</label>
                        <input type="text" class="form-control" name="ig">
                      </div>
                      <div class="form-group col-6">
                        <label for="nama">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin">
                      </div>
                      <div class="form-group col-6">
                        <label for="nama">Line</label>
                        <input type="text" class="form-control" name="line">
                      </div>
                      <div class="form-group col-6">
                        <label for="nama">Whatsapp</label>
                        <input type="text" class="form-control" name="wa">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-left">
                    <button class="btn btn-primary">Submit</button>
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
