<?php 
	session_start();
	include 'config/connection.php';
	@$user = $_POST['user'];
	@$pass = $_POST['pass'];
	@$hak = $_POST['hak'];
	@$req = "dashboard.php";

	if (isset($_POST['login'])) {
		if (empty($user) || empty($pass)) {
			echo "<script>alert('Data tidak boleh kosong');</script>";
		}else{
			@$sql = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' AND akses = '$hak'");
			@$cek = mysqli_num_rows($sql);
			@$data = mysqli_fetch_array($sql);
			if ($cek == 1) {
				if ($data['akses'] == 'manager') {
					$_SESSION['hak_akses'] = $hak;
					$_SESSION['username'] = $user;
          $_SESSION['id']=$data['id'];
					echo "<script>alert('Selamat datang manager');document.location.href='$req'</script>";
				}elseif ($data['akses'] == 'admin') {
					$_SESSION['hak_akses'] = $hak;
					$_SESSION['username'] = $user;
          $_SESSION['id']=$data['id'];
					echo "<script>alert('Selamat datang Admin');document.location.href='$req'</script>";
				}elseif ($data['akses'] == 'kasir') {
					$_SESSION['hak_akses'] = $hak;
					$_SESSION['username'] = $user;
          $_SESSION['id']=$data['id'];
					echo "<script>alert('Selamat datang Kasir');document.location.href='$req'</script>";
				}
			}else{
				echo "<script>alert('Gagal Login');</script>";	
			}
		}
	}
 ?>
<html>
	<head>
		<title>Form Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</head>
	<body>
		<form method="post" >
					<div class=" position-absolute top-50 start-50 translate-middle w-25 text-secondary border border-light shadow-lg border-2 p-5 ">

										<label class="form-label h6 mb-2">Username</label>
										<input type="text" name="user" class="form-control" placeholder="masukan username" required="">
									
										<label class="form-label h6 mb-2">Password</label>
										<input class="form-control" rows="3" id="inputPassword3" type="password" name="pass" placeholder="masukan password">
								
                    <label class="form-label h6 mb-2">Hak Akses</label>
                    
                      <select class="form-control" name="hak">
                        <option selected>Pilih akses</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="manager">Manager</option>
                      </select>
                     
                                    
									<div class="row p-2">
										<button class="btn btn-primary text-light mt-3 " type="submit" name="login">Login</button>
									</div>
					</div>
		</form>
	</body>
</html>
<!-- <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
              <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                  <i class="fa fa-bars"></i>
                  <span class="sr-only">Toggle Menu</span>
                </button>
              </div>
              <h1><a href="index.html" class="logo">Project Name</a></h1>
              <ul class="list-unstyled components mb-5">
          <li class="active">
          <?php if ($_SESSION['hak_akses'] =="kasir"){?>
            <a href="?menu=penjualan"><span class="fa fa-home mr-3"></span>Kasir</a>
          </li>
          <li>
              <a href="?menu=cetakfak"><span class="fa fa-user mr-3"></span> Cetak Faktur</a>
          </li>
          <li>
            <a href="?menu=laporanPenjualan"><span class="fa fa-sticky-note mr-3"></span> Laporan Penjualan</a>
          </li>
          <?php } elseif ($_SESSION['hak_akses'] =="admin") {?>
          <li>
            <a href="?menu=buku"><span class="fa fa-sticky-note mr-3"></span> Input Buku</a>
          </li>
          <li>
            <a href="?menu=pasok"><span class="fa fa-paper-plane mr-3"></span> Input Distributor</a>
          </li>
          <li>
            <a href="?menu=distributor"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>
          <li>
            <a href="?menu=distributor"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li> 
          <li>
            <a href="?menu=laporanPenjualan"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>
          <li>
            <a  href="?menu=lap_terlaris"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>
          <?php } elseif ($_SESSION['hak_akses'] =="manager") {?>
            <li>
            <a  href="?menu=set_lap"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>         
           <li>
            <a  href="?menu=input_user"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>          
          <li>
            <a  href="?menu=cetakfak"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>          
          <li>
            <a href="?menu=laporanPenjualan"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>          
          <li>
            <a   href="?menu=lap_buku"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>          
          <li>
            <a  href="?menu=lap_pasok"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>          
          <li>
            <a  href="?menu=lap_terlaris"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li>
          <?php } ?>
        </ul>

    	</nav> -->