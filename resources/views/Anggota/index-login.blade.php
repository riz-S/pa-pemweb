<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Cari Komunitas | FILCOM</title>

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
  </style>
</head>
{{--Kurang breadcrumb| Tunggu search dan filter | Warning atau kasus failed?--}}
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      @if(session()->has('sessioninfo'))
        <x-navbar-2 nama="{{session()->get('nama')[count(session()->get('nama'))-1]}}" foto="{{session()->get('foto')[count(session()->get('foto'))-1]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>
      @else
        <x-navbar-visitor></x-navbar-visitor>
      @endif
      <!-- Main Content -->
      <div class="main-content" style="min-height: 659px;">
        <section class="section">
          <div class="section-header">
            <div class="container">
              <div class="row">
                <div class="col-7">
                  <h1>Homepage</h1>
                </div>
                  <div class="col">
                    <form method="get" action="{{route('index.anggota')}}" >
                      <div class="input-group">
                        <select name="filter" id="inputGroupSelect05" class="custom-select">
                          <option value="-">Semua Komunitas</option>
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
            <h2 class="section-title">Daftar Komunitas</h2>
            <p class="section-lead">Pada page ini kamu bisa menemukan berbagai komunitas yang telah terdaftar di website</p>
            <div class="row">
              @foreach(array_keys($komunitas) as $jenis)
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>{{$jenis}}</h4>
                      </div>
                      <div class="card-body">
                        @if(count($komunitas[$jenis])!=0)
                          <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            @foreach($komunitas[$jenis] as $kom)
                              <li class="media">
                              <?php $logo = isset($kom->logo)?$kom->logo:'default.png';?>
                                <img alt="image" class="mr-3 rounded-circle" width="70" src="{{asset("assets/img/logo-komunitas/$logo")}}">
                                <div class="media-body">
                                  <div class="media-right"><a href="{{route('showInfoKomunitas.anggota',[$kom->komunitasId])}}" class="btn btn-info">Selengkapnya</a></div>
                                  <div class="media-title mb-1">{{$kom->nama}}</div>
                                  <div class="text-time">{{$kom->jenis}}</div>
                                  <div class="media-description text-muted">
                                  {{$kom->deskripsi}}
                                  </div>
                                  <div class="media-links">
                                  <p class = "name-ketua">Ketua: {{$kom->ketua}}</p>
                                  </div>
                                </div>
                              </li>
                            @endforeach
                          </ul>
                        @else
                          <h5 class="text-center">Tidak terdapat {{$jenis}}</h5>
                        @endif
                      </div>
                    </div>
                  <div class="owl-dots"><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div></div>
                </div>
              @endforeach
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
