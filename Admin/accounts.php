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

                    <li class="nav-item">
                        <a class="nav-link" href="peninjaupesanan.php">
                            <i class="fas fa-clipboard-list"></i>
                            Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="konversiharga.php">
                            <i class="fas fa-money-check-alt"></i>
                            Konversi Harga
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php">
                            <i class="fas fa-history"></i>
                            Riwayat
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
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <center>
            <h2 class="tm-block-title d-inline-block">Profil Admin</h2>
            </center>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="" class="tm-edit-product-form">
              <div class="form-group mb-3">
                <label
                for="name"
                >Username
              </label>
              <input
              id="username"
              name="username"
              type="text"
              class="form-control validate"
              value="<?php echo $admin['username']; ?>"
              />
            </div>
            <div class="form-group mb-3">
                <label
                for="name"
                >Password
              </label>
              <input
              id="password"
              name="password"
              type="password"
              class="form-control validate"
              value="<?php echo $admin['password']; ?>"
              />
            </div>
            <div class="form-group mb-3">
                <label
                for="name"
                >No. Telepon
              </label>
              <input
              id="notelp"
              name="notelp"
              type="text"
              class="form-control validate"
              value="<?php echo $admin['notelp']; ?>"
              />
            </div>
      
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
      <div class="tm-product-img-dummy mx-auto">
        <i
        class="fas fa-cloud-upload-alt tm-upload-icon"
        onclick="document.getElementById('fileInput').click();"
        ></i>
      </div>
      <div class="custom-file mt-3 mb-3">
        <input id="fileInput" type="file" style="display:none;" />
        <input
        type="button"
        class="btn btn-primary btn-block mx-auto"
        value="UNGGAH FOTO"
        onclick="document.getElementById('fileInput').click();"
        />
      </div>
    </div>
    <div class="col-12">
      <button type="simpan" name='simpan' class="btn btn-primary btn-block text-uppercase">SIMPAN</button>
    </div>
    <br><br><br>
    <div class="col-12">
      <button type="" class="btn btn-primary btn-block text-uppercase">Tambah Admin</button>
    </div>
  </form>
</div>
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
