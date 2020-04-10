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

// kalau tidak ada id di query string
if( !isset($_GET['id_jenis']) ){
  header('Location: konversiharga.php');
}

//ambil id dari query string
$id_jenis = $_GET['id_jenis'];

// buat query untuk ambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM konversiharga WHERE id_jenis = '$id_jenis'");
// $sql = "SELECT * FROM calon_siswa WHERE id=$id";
// $query = mysqli_query($db, $sql);
$konversiharga = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
  die("data tidak ditemukan...");
}
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
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
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
                        <a class="nav-link active" href="konversiharga.php">
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
                        <a class="nav-link" href="accounts.php">
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
                        <h2 class="tm-block-title d-inline-block">Edit Konversi Harga Sampah</h2>
                        <form class="form-horizontal" method="post" action="konversiharga-proses-edit.php">
                          <div class="form-group">
                            <label for="" class="">Jenis</label>
                            <div class="col-6">
                              <input type="text" class="form-control" name="nama_jenis" value="<?php echo $konversiharga['nama_jenis']; ?>" required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="">Harga</label>
                            <div class="col-6">
                              <input type="number" class="form-control" name="harga" value="<?php echo $konversiharga['harga']; ?>" required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="">Poin</label>
                            <div class="col-6">
                              <input type="number" class="form-control" name="poin" value="<?php echo $konversiharga['poin']; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase" value="Simpan" name="simpan">Simpan</button>
                          </div>
                        </form>
                    </div>
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

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
  $(function() {
    $("#expire_date").datepicker({
      defaultDate: "10/22/2020"
  });
});
</script>
</body>
</html>
