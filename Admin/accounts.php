<?php
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}

@ini_set('output_buffering',0);
set_time_limit(0);
error_reporting(0);

    if (!isset($_SESSION['password']) || !isset($_SESSION['username'])) {     
        session_unset();
        header("Location:login.php");
        exit;
    }

require_once 'koneksi.php';

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user = '$id_user'");
$admin = mysqli_fetch_array($query);
$id_user = $admin['id_user'];
$username = $admin['username'];
$notelp = $admin['notelp'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>POLINEMA-PAY</title>
  <link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto:400,700"
  />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
-->
</head>

<body id="reportsPage">
  <div class="" id="home">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index-admin.php">
          <h1 class="tm-site-title mb-0">POLINEMA-PAY</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="index-admin.php">
              <i class="fas fa-home"></i>
              Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users"></i>
            <span>
              User Mahasiswa <i class="fas fa-angle-down"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="peninjaupesanan.php">Peninjau Pesanan</a>
           <a class="dropdown-item" href="hargasampah.php">Harga Sampah</a>
         </div>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-store"></i>
        <span>
          Merchant<i class="fas fa-angle-down"></i>
        </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Tambah Merchant</a>
        <a class="dropdown-item" href="#">Penukaran Poin</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="konversipoin.php">
        <i class="fas fa-coins"></i>
        Konversi Poin
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="accounts.php">
        <i class="far fa-user"></i>
        Profil
      </a>
    </li>
    
  </ul>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link d-block" href="logout.php">
        Admin, <b>Logout</b>
      </a>
    </li>
  </ul>
</div>
</div>
</nav>
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="tm-block-col tm-col-avatar">
      <div class="tm-bg-primary-dark tm-block tm-block-avatar">
        <h2 class="tm-block-title">Foto</h2>
        <div class="tm-avatar-container">
          <img
          src="img/user.png"
          class="tm-avatar img-fluid mb-4"
          />
          <a href="#" class="tm-avatar-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
          </a>
        </div>
        <button class="btn btn-primary btn-block text-uppercase">
          Upload foto
        </button>
      </div>
    </div>
    <div class="tm-block-col tm-col-account-settings">
      <div class="tm-bg-primary-dark tm-block tm-block-settings">
        <h2 class="tm-block-title">Profil</h2>
        <form action="accounts-proses.php" class="tm-signup-form row">
          <div class="form-group col-lg-6">
            <label for="name">Username</label>
            <input
            id="name"
            name="name"
            type="text"
            class="form-control validate"
            value="<?php echo $admin['username']; ?>"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="password">Password</label>
            <input
            id="password"
            name="password"
            type="password"
            class="form-control validate"
            value="<?php echo $admin['password']; ?>"
            />
          </div>
          <div class="form-group col-lg-6">
            <label for="phone">Nomor Telepon</label>
            <input
            id="phone"
            name="phone"
            type="tel"
            class="form-control validate"
            value="<?php echo $admin['notelp']; ?>"
            />
          </div>
          <div class="form-group col-lg-6">
            <label class="tm-hide-sm">&nbsp;</label>
            <button
            type="simpan"
            name="simpan"
            class="btn btn-primary btn-block text-uppercase">
            Update Profil
          </button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2020</b> | Berliana - Ilmiyatus
    </p>
  </div>
</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
</body>
</html>
