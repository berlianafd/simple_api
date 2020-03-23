<?php
require_once 'inc/koneksi.php';
$id_u = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM data_admin_user WHERE id_user = '$id_u'");
$data_admin_user = mysqli_fetch_array($query);
$id_user = $data_admin_user['nama_admin'];
$gambar_admin = $data_admin_user['gambar_admin'];
?>
<html>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php">POLINEMA-Pay</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index-admin.php">Beranda</a>
      </li>
      
      <!-- <li class="nav-item">
        <a class="nav-link" href="portofolio-admin.php">Portofolio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tentang-kami-admin.php">Tentang Kami</a>
      </li>
 -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="data-pemesanan.php">Data Pemesanan</a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="jemputsampah.php">Peninjau Pesanan</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="index-admin.php">Konversi Poin</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="data-pemesanan-perbulan.php">Laporan Pemesanan Perbulan</a>
      </li> -->
      <?php
 
      if ($_SESSION['id_user'] == 1){
          echo "<li class='nav-item'><a class='nav-link' href='tambah-merchant.php'>Tambah Merchant</a></li>";
      } 
      ?>
      <?php
 
      if ($_SESSION['id_user'] == 1){
          echo "<li class='nav-item'><a class='nav-link' href='tambah-admin.php'>Tambah Admin</a></li>";
      } 
      ?>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <img src="gambar/user.png" style="border-radius: 9em;  box-shadow: rgb(255, 255, 255); padding: 4px; width: 50px"/>
          </a>
         
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profil-admin.php">Profil</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
      </li>

<!--       <li class="nav-item">
        <a class="nav-link" href="profil-admin.php">Profil Admin</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li> -->
    </ul>
  </nav>
  </html>