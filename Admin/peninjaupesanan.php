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

$query = mysqli_query($koneksi,"SELECT * FROM konversi_poin ORDER BY id");
$menu = mysqli_fetch_array($query);
$no=1;

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
          <a class="dropdown-item" href="tambah-merchant.php">Tambah Merchant</a>
          <a class="dropdown-item" href="penukaranpoin-merchant.php">Penukaran Poin</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="konversipoin.php">
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
        <a class="nav-link d-block" href="logout.php">
          Admin, <b>Logout</b>
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>
<div class="">
  <div class="row tm-content-row">
    <div class="">
      <div class="">
        <br>
        <center><h3 class="text-bg">Peninjau Pesanan Jemput Sampah</h3></center>
        <table class="table table-hover ">
          <thead>
            <tr align="center">
              <th>No.</th>
              <!-- <th>Id User</th> -->
              <th>Nama Acara</th>
              <th>No. Telp</th>
              <th>Alamat</th>
              <th>Kecamatan</th>
              <th>Kelurahan</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Perkiraan Berat Sampah</th>
              <th>Foto Dokumen</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;      
            $batas = 3;
            if(isset($_POST['qcari'])){
              $qcari=$_POST['qcari'];
              $result1 = mysqli_query($koneksi,"select count(*) from permintaanjemputsampah where namaAcara like '%$qcari%'");
            } else {
              $result1 = mysqli_query($koneksi, "SELECT count(*) FROM permintaanjemputsampah");
            }
            $recordcount = mysqli_fetch_row($result1)[0];
            $pagecount = ceil($recordcount / $batas);
            if(!isset($_GET['page'])){
              $activepage = 1;
            } else {
              $activepage = $_GET['page'];
            }
            $mulai = $batas * ($activepage-1);
            if(isset($_POST['qcari'])){
              $qcari=$_POST['qcari'];
              $query = mysqli_query($koneksi,"SELECT  id, idUser, namaAcara, notelp, alamat, kecamatan, kelurahan, tanggal, waktu, perkiraanBeratSampah, fotoDokumen, Status FROM permintaanjemputsampah where namaAcara like '%$qcari%' limit $mulai, $batas");
            } else { 
              $query = mysqli_query($koneksi,"SELECT * FROM permintaanjemputsampah");   
            }
            while ($menu = mysqli_fetch_array($query)) {
              ?>
              <tr align="center">
                <td><p><?php echo $no; ?></p></td>
                <!-- <td><p><?php echo $menu['idUser'];?></p></td> -->
                <td><p><?php echo $menu['namaAcara'];?></p></td>
                <td><p><?php echo $menu['notelp'];?></p></td>
                <td><p><?php echo $menu['alamat'];?></p></td>
                <td><p><?php echo $menu['kecamatan'];?></p></td>
                <td><p><?php echo $menu['kelurahan'];?></p></td>
                <td><p><?php echo $menu['tanggal'];?></p></td>
                <td><p><?php echo $menu['waktu'];?></p></td>
                <td><p><?php echo $menu['perkiraanBeratSampah'];?></p></td>
                <td><p><?php echo "<img src='gambar/$menu[image_name]'width='50' height='50'/>";?></p></td>
                <?php  
                  $pilih_status   = array(
                    array(
                      'label'             => 'Terima',
                      'value'             => 'terima',
                    ),
                    array(
                      'label'             => 'Tolak',
                      'value'             => 'tolak',
                    )
                  );
                ?>
                <td><p><?php echo $menu['Status'];?></p></td>           
                <td>
                  <select class="badge" onchange="status(<?php echo $menu['id'] ?>)" 
                    id="<?php echo 'aksistatus' . $menu['id'] ?>"style="width: 70%">
                    <option selected disabled>Pilih Status</option>
                    <?php foreach ($pilih_status as $anuuuuu): 
                      $selected   = ( $menu['Status'] == $anuuuuu['value'] )? 'selected' : false;
                      ?>
                      <option value="<?php echo $anuuuuu['value'] ?>" 
                        <?php echo $selected ?>><?php echo $anuuuuu['label'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </p></td>
              </tr>
              <?php
              $no++;
            }
            ?>  
          </tbody>
        </table>
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

<script type="text/javascript">
    function status (id){
      var aksi = $('#aksistatus' + id ).val();  
      $.ajax({
        url: 'status-peninjaupesanan.php',
        type: 'POST',
        dataType: 'json',
        data: {
            value: aksi,
            id: id
        },
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      });
      
    }



    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>
</body>
</html>
