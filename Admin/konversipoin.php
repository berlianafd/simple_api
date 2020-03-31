<?php
require_once 'koneksi.php';

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
        <a class="navbar-brand" href="index.php">
          <h1 class="tm-site-title mb-0">POLINEMA-PAY</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
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
        <a class="nav-link active" href="konversipoin.php">
          <i class="fas fa-coins"></i>
          Konversi Poin
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
        <a class="nav-link d-block" href="login.php">
          Admin, <b>Logout</b>
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <p class="text-white">Konversi Poin</p>
        <table class="table table-hover">
          <thead>
            <tr align="center">
              <th></th>
              <th>Poin</th>
              <th>Harga (Rp)</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM konversi_poin");

            while($menu = mysqli_fetch_array($query)){
              echo "<tr>";
              echo "<td><center>"."Jumlah"."</center></td>";
              echo "<td><center>".$menu['poin']."</center></td>";
              echo "<td><center>".$menu['harga']."</center></td>";
              echo "<td><center>";
              echo "<a class='btn btn-info' href='konversipoin-edit.php?id=".$menu['id']."'>Edit</a> ";
              echo "</center></td>";
              echo "</tr>";
            }

            ?>
            <!-- <tr align="center">
              <td><p>Jumlah</p></td>
              <td><p><?php echo $menu['poin']; ?></p></td>
              <td><p>Rp <?php echo $menu['harga'];?></p></td>
              <td><p><a class='btn btn-info' href='konversipoin-edit.php?id=$menu[id]'><i class='fa fa-pencil'></i> Edit</a></p></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div><br><br><br><br>

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
