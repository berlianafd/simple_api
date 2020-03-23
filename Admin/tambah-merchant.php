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
require 'inc/koneksi.php'; 
?>
<html>
<head>
  <title>POLINEMA_Pay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="keywords" content="Fast Service a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/style_common.css" />
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/style-popup.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="//fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
</head>
<header>
  <!-- header -->
  <?php
  include"navbar-admin.php";
  ?>
  <!-- //header -->

  <!-- banner -->
  <!-- banner-slider -->
  <div class="w3l_banner_info">
    <div class="slider1">
      <div class="callbacks_container">
        <ul class="rslides" id="slider3">
          <li>
            <div class="slider1-img">
              <div class="slider_banner_info">                
              </div>
            </div>
          </li>       
        </ul>
      </div>
    </div>
  </div>
  <!-- //banner-slider -->
</header>
<body>
<section class="contact_form py-5" >
  <div class="container">
    <div class="heading">
    <h1 class="heading text-capitalize mb-5 pb-3"><span>TAMBAH</span></h1>
      <h4 class="position cont">MERCHANT</h4>
    </div>
<!--     <div class="w3l_banner_info">
    <div class="slider">
     <div class="callbacks_container"> -->
      <ul class="rslides" id="slider3">
       <li>
<!--         <div class="slider-img"> -->
<!--          <div class="slider_banner_info"> -->
           <div class="text-a">
            <div class="modal-dialog-a" role="document">
              <div class="modal-content-a">
                <section>
                  <!-- //bootstrap-pop-up for login and register-->

                  <div class="modal-body">
                    <div class="loginf_module">
                      <div class="module form-module">
                        <div class="toggle">
                         </div>
                        <div class="form">
                         <!--  <h3>Login to your account</h3> -->
                          <form method="POST" enctype="multipart/form-data">
                            <input type="text" name="nama" placeholder="Nama" required="">
                            <input type="text" name="nohp" placeholder="No.HP" required="">
                            <input type="password" name="password" placeholder="Password" required="">
                            <input type="submit" name="submit" value="Tambah">
                          </form>
                              <div class="cta">
                            <!-- <a href="#">Forgot password?</a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
            <!-- //bootstrap-pop-up for login and register-->

          </div>
<!--         </div> -->
<!--       </div> -->
    </li>
  </ul>
<!-- </div>
</div>
</div> -->
<!--        <form method="POST" enctype="multipart/form-data">  
        <div class="input-w3ls w3ls-left">
          <input type="text" class="username" name="username" placeholder="Username" required="">
        </div>
        <div class="input-w3ls w3ls-left">
          <input type="password" class="psw" name="password" placeholder="Password" required="">
        </div>  
        <div class="input-w3ls">
          <input type="submit"  name="submit" id="submit"  value="Submit">
        </div>   -->  

        <!-- <a href='#popup'>pesan</a>

        <div id="popup">
          <div class="window">
            <a href="#" class="close-button" title="Close">X</a>
            <h2>Selamat Datang di DUMET School</h2>           
          </div>
        </div> -->
      </form>
    </div>
  </div>
</section>

 <?php
require 'inc/koneksi.php';

if (isset($_POST['submit'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];                       
                  echo "$username";
                  echo "$password"; 
                  // $tgl_perbaikan +$locate;

                  $query = "INSERT INTO user (`username`,`password`) VALUES ('$username', '$password')";
                    mysqli_query($koneksi, $query);
                    echo "<script type='text/javascript'>alert('Pendaftaran user Berhasil!');history.go(-3);</script>";

        }
        // if($aksi)
        // {              
        //          echo "$id_user"; 
        //          echo "$username";
        //          echo "$password";
        //          // $tgl_perbaikan +$locate;
        //          $query = "INSERT INTO pemesanan (`id_user`, `username`, `password`) VALUES (NULL, '$id_user', '$username', '$password')";
        //             // mysqli_query($koneksi, $query);
        //             // echo "<script type='text/javascript'>alert('Pemesanan Berhasil! Tunggu Kedatangan kami!');history.go(-3);</script>";
        // }
?>

  <!-- js-scripts -->   
  <script  src="js/jquery.min.v3.js"></script>
  <script  src="js/bootstrap.min.js"></script>
  <script  src="js/move-top.js"></script>
  <script  src="js/easing.js"></script>
  <script  src="js/SmoothScroll.min.js"></script> 
  <!-- js -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
  <!-- //js --> 
  
  <!-- start-smoth-scrolling -->
  <script src="js/SmoothScroll.min.js"></script>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>
  <!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
        
        $().UItoTop({ easingType: 'easeOutQuart' });      
      });
    </script>
    <!-- //here ends scrolling icon -->
    <!-- start-smoth-scrolling -->
    
    <!-- //js-scripts -->

  </body>
  <footer>
    <?php
    include"footerend.php";
    ?>
  </footer>
</body>
</html>