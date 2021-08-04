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
      <div class="main-content" style="min-height: 659px;">
        <section class="section">
          <div class="section-header">
            <h1>Homepage</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Daftar Komunitas</h2>
            <p class="section-lead">Pada page ini kamu bisa menemukan berbagai komunitas yang telah terdaftar di website</p>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Lembaga Semi Otonom (LSO)</h4>
                  </div>
                  <div class="card-body">
                    <div class="float-left">
                      <select class="form-control selectric">
                        <option value ="1" selected>Tampilkan Semua</option>
                        <option value ="2">Lembaga Otonom</option>
                        <option value ="3">Lembaga Semi Otonom</option>
                        <option value ="4">Komunitas</option>
                      </select>
                    </div>
                    <div class="float-right">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>
                    <br>

                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                      
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/krisma.png">
                        <div class="media-body">
                          <div class="media-right"><a href="#" class="btn btn-info">Lihat Detail</a></div>
                          <div class="media-title mb-1">Kelompok Riset Mahasiswa</div>
                          <div class="text-time">Lembaga Semi Otonom</div>
                          <div class="media-description text-muted">Bergerak sebagai wadah bagi mahasiswa dalam meningkatkan kualitas organisasi di FILOKM,
                            BEM berkomitmen menjadi lembaga Eksekutif yang mampu membawa FILKOM menuju masa kejayaan.
                          </div>
                          <div class="media-links">
                          <p class = "name-ketua">Ketua: Riza Setiawan</p>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/bios.jpg">
                        <div class="media-body">
                          <div class="media-right"><a href="#" class="btn btn-info">Lihat Detail</a></div>
                          <div class="media-title mb-1">Badan Internal Olahraga dan Seni</div>
                          <div class="text-time">Lembaga Semi Otonom</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                          <div class="media-links">
                          <p class = "name-ketua">Ketua: Riza Setiawan</p>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/raion.png">
                        <div class="media-body">
                          <div class="media-right"><a href="#" class="btn btn-info">Lihat Detail</a></div>
                          <div class="media-title mb-1">Raion Community</div>
                          <div class="text-time">Lembaga Semi Otonom</div>
                          <div class="media-description text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident</div>
                          <div class="media-links">
                            <p class = "name-ketua">Ketua: Riza Setiawan</p>
                          </div>
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

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>
