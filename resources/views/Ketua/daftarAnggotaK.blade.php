<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Daftar Anggota | {{$komunitas->nama}}</title>

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

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <x-navbar-2 nama="{{session()->get('nama')[0]}}" foto="{{session()->get('foto')[0]??'default.png'}}" time="{{date_diff(new DateTime(session()->get('sessiontime')[0]),new DateTime())->i}}"></x-navbar-2>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{$komunitas->nama}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="{{route('showInfoKomunitas.anggota',[$komunitas->komunitasId])}}">Beranda Komunitas</a></div>
              <div class="breadcrumb-item active">Daftar Anggota</div>
            </div>
          </div>
          @if ($message = Session::get('success'))
            <x-alert type="success alert-dismissible show fade" title="Success" msg="{{$message}}"></x-alert>
          @endif
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Anggota</h4>
                    <div class="card-header-action">
                      <form method="POST" action="{{route('filterAnggota.anggota',[$komunitas->komunitasId])}}">
                        @csrf
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" name="search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <a href="{{route('tambahAnggota.ketua',[$komunitas->komunitasId])}}" class="btn btn-primary">Tambah Anggota</a>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Domisili</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($anggotas as $anggota)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$anggota->nama}}</td>
                              <td>{{$anggota->divisiNama??'-'}}</td>
                              <td class="align-middle">
                                {{$anggota->jabatan}}
                              </td>
                              <td>
                                {{$anggota->domisili}}
                              </td>
                              
                              <td><div class="badge badge-{{($anggota->statusacc==1)?'success':'danger'}}">{{($anggota->statusacc==1)?'Joined':'Not Joined'}}</div></td>
                              <td>
                                <a href="{{route('showEditAnggota.anggota',[$anggota->anggotaId])}}" class="btn btn-warning">Edit</a>
                                @if($anggota->userId!=$mine)
                                  <a href="{{route('deleteAnggota.ketua',[$anggota->anggotaId])}}" class="btn btn-danger">Delete</a>
                                  @if($anggota->userId!=null)
                                    <a href="{{route('tukarKetua.ketua',[$anggota->anggotaId])}}" class="btn btn-info">Set sebagai ketua</a>
                                  @endif
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>>
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
