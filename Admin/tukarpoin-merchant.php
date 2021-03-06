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
?>

<?php
if(isset($_POST['reset'])){
  $idUser = $_POST['idUser'];
  $totalBeratSampah = $_POST['totalBeratSampah'];
  $totalBeratPlastik = $_POST['totalBeratPlastik'];
  $totalBeratKertas = $_POST['totalBeratKertas'];
  $totalPoin = $_POST['totalPoin'];

  $query = mysqli_query($koneksi, "UPDATE totalpoinuser SET totalPoin=0 WHERE idUser='$idUser'");

  if( $query ) {
    header('Location: totalpoin-merchant.php');
  } else {
    die("Gagal menyimpan perubahan...");
  }
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>POLINEMA-PAY</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <style>
    #footer{position:absolute;bottom:0;width:100%;text-align:center;}
  </style>
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
  <div class="container">
    <br>
    <!-- row -->
    <div class="row tm-content-row">
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
          <a class="btn btn-light btn-sm " href="user-merchant.php" role="button"> <- Kembali</a>
          <br><br>
          <h2 align="center" class="tm-block-title">Data Poin Merchant</h2>

          <table class="table table-hover ">
            <thead>
              <tr align="center">
                <th>ID User</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Total Poin</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;      
              $batas = 3;
              if(isset($_POST['qcari'])){
                $qcari=$_POST['qcari'];
                $result1 = mysqli_query($koneksi,"select count(*) from totalpoinuser where idUser like '%$qcari%'");
              } else {
                $result1 = mysqli_query($koneksi, "SELECT count(*) FROM totalpoinuser");
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
                $query = mysqli_query($koneksi,"SELECT  idUser, totalBeratSampah, totalBeratKertas, totalBeratPlastik, totalPoin FROM totalpoinuser where idUser like '%$qcari%' limit $mulai, $batas");
              } else { 
                $query = mysqli_query($koneksi,"SELECT u.id, u.name, u.nohp, t.totalPoin FROM user AS u INNER JOIN totalpoinuser AS t ON u.id = t.idUser WHERE u.level='Merchant'");   
              }
              while ($menu = mysqli_fetch_array($query)) {
                ?>
                <tr align="center">
                  <td><p><?php echo $menu['id'];?></p></td>
                  <td><p><?php echo $menu['name'];?></p></td>
                  <td><p><?php echo $menu['nohp'];?></p></td>
                  <td><p><?php echo $menu['totalPoin'];?></p></td>
                  <td><a class='btn btn-info' value='reset' name="reset" type="reset">Reset Poin</a></td>
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
 <div id="footer">
  <footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2020</b> | Berliana - Ilmiyatus
    </p>
  </div>
</footer>
</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="js/tooplate-scripts.js"></script>
<script>
  Chart.defaults.global.defaultFontColor = 'white';
  let ctxLine,
  ctxBar,
  ctxPie,
  optionsLine,
  optionsBar,
  optionsPie,
  configLine,
  configBar,
  configPie,
  lineChart;
  barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
              updateLineChart();
              updateBarChart();                
            });
          })
        </script>
      </body>

      </html>