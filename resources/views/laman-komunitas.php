<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title> -->

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/css/bootstrap-social.css">
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <style>
    .name-ketua{
      font-size: 12px;
    }
  </style>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <?php include 'components/navbar-2.php';?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="alert alert-warning">
            <div class="alert-title">Danger</div>
            This is a danger alert.
          </div>
          <div class="section-header">
            <h1>Laman Komunitas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="laman-komunitasK.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="edit-anggota.php">Edit Biodata</a></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Basic Computing Community</h2>
            <p class="section-lead">Pada page ini kamu bisa melihat lebih banyak informasi mengenai suatu komunitas</p>

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <img alt="image" src="assets/img/bcc.jpg" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <a href="join-komunitas.php" class="btn btn-danger btn-icon icon-right">Gabung</a>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#">Basic Computing Community</a>
                      </div>
                      <div class="author-box-job">Komunitas</div>
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
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </div>
                          <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                          Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                          </div>
                          <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                          Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Anggota Komunitas</h4>
                    <div class="card-header-action">
                      <a href="daftarAnggotaA.php" class="btn btn-danger btn-icon icon-right">Selengkapnya <i class="fas fa-chevron-right"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme owl-loaded owl-drag" id="users-carousel">
                      <div>
                        <div class="user-item">
                          <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">Hasan Basri</div>
                            <div class="text-job text-muted">Web Developer</div>
                            <div class="user-cta">
                              <a href ="profile-anggota.php"><button class="btn btn-primary ">Hubungi</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="user-item">
                          <img alt="image" src="../assets/img/avatar/avatar-2.png" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">Kusnaedi</div>
                            <div class="text-job text-muted">Mobile Developer</div>
                            <div class="user-cta">
                            <button class="btn btn-primary ">Hubungi</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="user-item">
                          <img alt="image" src="../assets/img/avatar/avatar-3.png" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">Bagus Dwi Cahya</div>
                            <div class="text-job text-muted">UI Designer</div>
                            <div class="user-cta">
                            <button class="btn btn-primary ">Hubungi</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="user-item">
                          <img alt="image" src="../assets/img/avatar/avatar-4.png" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">Wildan Ahdian</div>
                            <div class="text-job text-muted">Project Manager</div>
                            <div class="user-cta">
                            <button class="btn btn-primary ">Hubungi</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="user-item">
                          <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid">
                          <div class="user-details">
                            <div class="user-name">Deden Febriansyah</div>
                            <div class="text-job text-muted">IT Support</div>
                            <div class="user-cta">
                            <button class="btn btn-primary ">Hubungi</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Divisi</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          <div class="media-right"><div class="text-primary">Approved</div></div>
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Program Kerja</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png">
                        <div class="media-body">
                          
                          <div class="media-title mb-1">Hubungan Masyarakat</div>
                          <div class="text-time">Ketua: I Putu Krisna Sedana</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include 'components/footer.php';?>
      
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="assets/owlcarousel/owl.carousel.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/components-user.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
