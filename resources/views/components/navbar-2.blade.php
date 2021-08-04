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
      <li class="nav-item {{($cekCurr=='buatKomunitas.ketua')?'active':''}}"><a href="{{route('buatKomunitas.ketua')}}" class="nav-link">Buat Komunitas</a></li>
      <li class="nav-item {{($cekCurr=='showMyKomunitas.anggota')?'active':''}}"><a href="{{route('showMyKomunitas.anggota')}}" class="nav-link">Komunitas Saya</a></li>
    </ul>
  </div>
  <ul class="navbar-nav ml-auto navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

      <img alt="image" src="{{asset("assets/img/profil/$foto")}}" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, {{$nama}}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in {{$time}} min ago</div>
        <a href="{{route('profil.anggota')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>