<nav class="navbar navbar-expand-lg main-navbar bg-primary">
  <a href="{{route('index.anggota')}}" class="navbar-brand sidebar-gone-hide">Filcom</a>
  <div class="navbar-nav">
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
  </div>
  <div class="nav-collapse">
    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
      <i class="fas fa-ellipsis-v"></i>
    </a>
    <ul class="navbar-nav mr-auto">
      <?php $cekCurr = Route::currentRouteName();?>
      <li class="nav-item {{($cekCurr=='index.anggota')?'active':''}}"><a href="{{route('index.anggota')}}" class="nav-link">Cari Komunitas</a></li>
    </ul>
  </div>
  <ul class="navbar-nav ml-auto navbar-right">
    <div class="media-right">
        <a href="{{route('login')}}" class="btn btn-info">Login</a>
        <a href="{{route('register')}}" class="btn btn-secondary">Registrasi</a>
    </div>
  </ul>
</nav>