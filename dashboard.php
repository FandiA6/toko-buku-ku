<?php
include 'config/connection.php';
session_start();
if ($_SESSION['username'] == null && $_SESSION['hak_akses'] == null) {
  echo "<script>alert('Data tidak boleh kosong');</script>";
}
if (isset($_GET['logout'])) {
  unset($_SESSION['username']);
  unset($_SESSION['hak_akses']);
  header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title></title>
  <Favicon<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- <!-- Core theme CSS (includes Bootstrap) -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

  <link href="css/aos.css" rel="stylesheet">
  <script src="scripts/main.js"></script>
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>

  <div class="  d-flex" id="wrapper">
    <!-- <!-- Sidebar -->
    <div id="sidebar-wrapper " class="bg-dark" >

      <div class="list-group list-group-flush ">

        <nav id="sidebar">
          <div class="sidebar-heading  bg-primary text-light py-3 pl-5 h3">Menu</div>
          <ul class="list-unstyled components bg-dark ">
            <li class="active">
              <?php if ($_SESSION['hak_akses'] == "kasir") { ?>
                <a href="?menu=penjualan"><span class="fa fa-shopping-cart mr-3"></span>Transaksi</a>
            </li>
            <li>
              <a href="?menu=cetakfak"><span class="fa fa-print mr-3"></span> Cetak Faktur</a>
            </li>
            <li>
              <a href="?menu=laporanPenjualan"><span class="fa fa-sticky-note mr-3"></span> Laporan Penjualan</a>
            </li>
          <?php } elseif ($_SESSION['hak_akses'] == "admin") { ?>
            <li>
              <a href="?menu=buku"><span class="fa fa-keyboard-o mr-3"></span> Input Buku</a>
            </li>
            <li>
              <a href="?menu=pasok"><span class="fa fa-book mr-3"></span> Pasok Buku</a>
            </li>
            <li>
              <a href="?menu=distributor"><span class="fa fa-recycle mr-3"></span> Distributor</a>
            </li>
            <li>
              <a href="?menu=laporanPenjualan"><span class="fa fa-newspaper-o mr-3"></span> Laporan Penjualan</a>
            </li>
            <li>
              <a href="?menu=lap_terlaris"><span class="fa fa-money mr-3"></span> Laporan Terlaris</a>
            </li>
            <li>
              <a href="?menu=lap_tidaklaku"><span class="fa fa-area-chart mr-3"></span> Laporan Buku Tidak laku</a>
            </li>
          <?php } elseif ($_SESSION['hak_akses'] == "manager") { ?>
            <li>
              <a href="?menu=set_lap"><span class="fa fa-file mr-3"></span> Set Laporan</a>
            </li>
            <li>
              <a href="?menu=input_user"><span class="fa fa-user mr-3"></span> Input User</a>
            </li>
            <li>
              <a href="?menu=cetakfak"><span class="fa fa-print mr-3"></span> Cetak Faktur</a>
            </li>
            <li>
              <a href="?menu=laporanPenjualan"><span class="fa fa-sticky-note mr-3"></span> Laporan Penjualan</a>
            </li>
            <li>
              <a href="?menu=lap_buku"><span class="fa fa-book mr-3"></span> Laporan Buku</a>
            </li>
            <li>
              <a href="?menu=lap_pasok"><span class="fa fa-line-chart mr-3"></span> Laporan Pasok</a>
            </li>
            <li>
              <a href="?menu=lap_terlaris"><span class="fa fa-money mr-3"></span> Laporan Terlaris</a>
            </li>
            <li>
              <a href="?menu=lap_tidaklaku"><span class="fa fa-area-chart mr-3"></span> Laporan Buku Tidak laku</a>
            </li>

          <?php } ?>
          </ul>
        </nav>


      </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <div class="container-fluid">
          <button class="btn btn-primary active" id="sidebarCollapse"><i class="fa fa-bars" aria-hidden="true"></i></button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item bg-dark active mr-3"><a class="nav-link" href="dashboard.php">Home <i class="fas fa-home ms-2" aria-hidden="true "></i></a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle bg-dark active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account<i class="fas fa-user ms-2"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="?logout" onclick="return confirm('Apakah anda yakin ingin keluar')">Logout</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="?menu=ganti_pass">Change password</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="container-fluid">
        <?php
        switch (@$_GET['menu']) {
          case 'home':
            include 'home.php';
            break;
          case 'buku':
            include 'buku.php';
            break;
          case 'distributor':
            include 'distributor.php';
            break;
          case 'pasok':
            include 'pasok.php';
            break;
          case 'kasir':
            include 'kasir.php';
            break;
          case 'penjualan':
            include 'penjualan.php';
            break;
          case 'laporanPasok':
            include 'laporanPasok.php';
            break;
          case 'laporanPenjualan':
            include 'lap_penjualan.php';
            break;
          case 'cetakfak':
            include 'cetak_fak.php';
            break;
          case 'cetak':
            include 'cetak.php';
            break;
          case 'cetakpasok':
            include 'cetakpasok.php';
            break;
          case 'lap_buku':
            include 'lap_buku.php';
            break;
          case 'lap_pasok':
            include 'lap_pasok.php';
            break;
          case 'input_user':
            include 'user.php';
            break;
          case 'set_lap':
            include 'set_lap.php';
            break;
          case 'lap_terlaris':
            include 'lap_penjualan_terlaris.php';
            break;
          case 'ganti_pass':
            include 'ganti_pass.php';
            break;
          case 'lap_tidaklaku':
            include 'lap_penjualan_tidaklaku.php';
            break;
          default:
            include 'landing_page.php';
            break;
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data').dataTable({

      });
    });
    $(document).ready(function() {
      $('#tabelbukum').dataTable({});
    });
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>