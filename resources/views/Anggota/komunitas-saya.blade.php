<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Komunitas saya</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('assets/owlcarousel/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/owlcarousel/assets/owl.theme.default.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

  <!-- <style>
    .name-ketua{
      font-size: 12px;
    }
    .name-community{
      font-size: 100px;
    }
  </style> -->
</head>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <x-navbar-2 nama="{{session()->get('nama')[0]}}" foto="{{session()->get('foto')[0]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @if ($message = Session::get('success'))
            <x-alert type="success alert-dismissible show fade" title="Success" msg="{{$message}}"></x-alert>
          @elseif($message = Session::get('gagal'))
            <x-alert type="danger alert-dismissible show fade" title="Akun tidak dapat dihapus" msg="{{$message}}"></x-alert>
          @endif
          <div class="section-header">
          <div class="container">
              <div class="row">
                <div class="col-7">
                  <h1>Komunitas saya</h1>
                </div>
                  <div class="col">
                    <form method="get" action="{{route('showMyKomunitas.anggota')}}" >
                      <div class="input-group">
                        <select name="filter" id="inputGroupSelect05" class="custom-select">
                          <option value="">Semua Komunitas</option>
                          @foreach($listJenis as $jenis)
                            @if($filterParam==$jenis)
                              <option selected="selected">{{$jenis}}</option>
                            @else
                              <option>{{$jenis}}</option>
                            @endif
                          @endforeach
                        </select>
                        <input name="search" type="text" class="form-control">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Daftar Komunitas Saya</h2>
            @if(count($komunitas)!=0)
              <div class="row">
                @foreach($komunitas as $kom)
                  <div class="col-12 col-md-4 col-lg-4">
                    <article class="article article-style-c">
                      <div class="article-header">
                        <?php $logo = isset($kom->logo)?$kom->logo:'default.png';?>
                        <div class="article-image" data-background="{{asset("assets/img/logo-komunitas/$logo")}}">
                        </div>
                      </div>
                      <div class="article-details">
                        <div class="article-category"><a>{{$kom->jabatanku}}</a></div>
                        <div class="article-title">
                          <p><a href="{{route('showInfoKomunitas.anggota',[$kom->komunitasId])}}">{{$kom->nama}}</a></p>
                        </div>
                        <p>{{$kom->deskripsi}}</p>
                        <div class="article-user">
                          <?php $foto = isset($ketua[$loop->index]->foto)?$ketua[$loop->index]->foto:'default.png';?>
                          <img alt="image" src="{{asset("assets/img/profil/$foto")}}">
                          <div class="article-user-details">
                            <div class="user-detail-name">
                              <a href="{{route('showDetailAnggota.anggota',[$ketua[$loop->index]->anggotaId])}}">{{$ketua[$loop->index]->nama}}</a>
                            </div>
                            <div class="text-job">{{$ketua[$loop->index]->jabatan}}</div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                @endforeach
              </div>
            @else
              <div class="jumbotron text-center">
                <h2>Tidak ada komunitas</h2>
                <p class="lead text-muted mt-3">Yuk tambah komunitas untukmu</p>
                <a href="{{route('index.anggota')}}" class="btn btn-primary mt-3">Cari Komunitas</a>
                <a href="{{route('buatKomunitas.ketua')}}" class="btn btn-primary mt-3">Buat Komunitas Baru</a>
              </div>
            @endif
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
