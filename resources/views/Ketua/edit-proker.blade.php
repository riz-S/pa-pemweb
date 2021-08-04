<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Proker | {{$proker->nama}}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

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
            <h1>Edit Proker</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('showInfoKomunitas.anggota',[$proker->komunitasId])}}">Beranda Komunitas</a></div>
              <div class="breadcrumb-item">Edit proker</div>
            </div>
          </div>
          @if($errors->any())
            <x-alert type="danger" title="Data tidak valid" msg="{{$errors->first()}}"></x-alert>
          @endif
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="POST" action="{{route('updateProker.ketua',[$proker->prokerId])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-left">
                        <h4>Edit Proker</h4>
                        <a href="{{route('deleteProker.ketua',[$proker->prokerId])}}" class="btn btn-danger">Hapus Proker</a>
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <div class="form-group col-12">
                            <label for="nama">Nama Program Kerja</label>
                            <input type="text" class="form-control" name="nama" value="{{$proker->nama}}">
                          </div>
                          <div class="form-group col-6">
                            <label>Tanggal Kegiatan Program Kerja</label>
                            <input type="date" class="form-control" name="tglProker" value="{{$proker->tglProker}}">
                          </div>
                          <div class="form-group col-6">
                            <label>Divisi Penanggung Jawab</label>
                            <select class="form-control selectric" name="divisi">
                              <option>-</option>
                              @foreach($listDivisi as $divisi)
                                @if($divisi->divisiId==$proker->divisiId)
                                  <option value="{{$divisi->divisiId}}" selected>{{$divisi->nama}}</option>
                                @endif
                                  <option value="{{$divisi->divisiId}}">{{$divisi->nama}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-12">
                            <label for="nama">Deskripsi</label>
                            <input type="textarea" class="form-control" name="desc" value="{{$proker->deskripsi}}">
                          </div>
                          <div class="form-group col-12">
                            <label for="nama">Logo (Opsional)</label>
                            <input type="file" class="form-control" name="logo">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-leftt">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
