<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Komunitas | {{$komunitas->nama}}</title>

    <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('assets/owlcarousel/owl.carousel.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/components-user.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            800:{
                items:5
            },
            1200:{
                items:6
            }
        }
      })
    });
  </script>

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

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

  <style>
    .name-ketua{
      font-size: 12px;
    }
  </style>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <x-navbar-visitor></x-navbar-visitor>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laman Komunitas</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('index.anggota')}}">Beranda</a></div>
              <div class="breadcrumb-item">Guest</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">{{$komunitas->nama}}</h2>
            <p class="section-lead">Pada page ini kamu bisa melihat lebih banyak informasi mengenai suatu komunitas</p>

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <?php $logo = isset($komunitas->logo)?$komunitas->logo:'default.png';?>
                      <img alt="image" src="{{asset("assets/img/logo-komunitas/$logo")}}" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <br>
                      <a href="{{route('dilarang')}}" class="btn btn-danger btn-icon icon-right">Gabung</a>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#">{{$komunitas->nama}}</a>
                      </div>
                      <div class="author-box-job">{{$komunitas->jenis}}</div>
                      <div class="author-box-description">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                          </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                          <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                            {{$komunitas->deskripsi}}
                          </div>
                          <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            <ul>
                                <li>Banyak Anggota: {{count($anggotas)}}</li>
                                <li>Banyak Divisi: {{count($divisis)}}</li>
                                <li>Banyak Proker: {{count($prokers)}}</li>
                            </ul>
                          </div>
                          <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                            <ul>
                              <li>Email: {{$komunitas->email??'-'}}</li>
                              <li>Instagram: {{$komunitas->ig??'-'}}</li>
                              <li>OA Line: {{$komunitas->line??'-'}}</li>
                              <li>Youtube: {{$komunitas->youtube??'-'}}</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Anggota Komunitas</h4>
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme slider owl-loaded owl-drag" id="users-carousel">
                      @foreach($anggotas as $anggota)
                        <div class="user-item">
                          <?php $foto = isset($anggota->foto)?$anggota->foto:'default.png';?>
                          <img alt="image" src="{{asset("assets/img/profil/$foto")}}" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">{{$anggota->nama}}</div>
                            <div class="text-job text-muted">{{$anggota->jabatan}}</div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-info">
                  <div class="card-header">
                    <h4>Divisi</h4>
                  </div>
                  <div class="card-body">
                    @if(count($divisis)!=0)
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        @foreach($divisis as $divisi)
                          <li class="media">
                            <?php $divisiLogo = isset($divisi->logo)?$divisi->logo:'default.png';?>
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="{{asset("assets/img/logo-divisi/$divisiLogo")}}">
                            <div class="media-body">
                              <div class="media-title mb-1">{{$divisi->nama}}</div>
                              <div class="text-time">Ketua: {{$divisi->ketua}}</div>
                              <div class="media-description text-muted">{{$divisi->deskripsi}}</div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    @else
                      <h5>Belum ada divisi</h5>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-info">
                  <div class="card-header">
                    <h4>Program Kerja</h4>
                  </div>
                  <div class="card-body">
                    @if(count($prokers)!=0)
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        @foreach($prokers as $proker)
                          <li class="media">
                            <?php $prokerLogo = isset($proker->logo)?$proker->logo:'default.png';?>
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="{{asset("assets/img/logo-proker/$prokerLogo")}}">
                            <div class="media-body">
                              <div class="media-title mb-1">{{$proker->nama}}</div>
                              <div class="text-time">Penanggung Jawab: {{$proker->divisi??'Komunitas'}}</div>
                              <div class="text-time">Tanggal Pelaksanaan: {{$proker->tglProker}}</div>
                              <div class="media-description text-muted">{{$proker->deskripsi}}</div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    @else
                      <h5>Belum ada proker</h5>
                    @endif
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

</body>
</html>
