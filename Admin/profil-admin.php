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

require_once 'inc/koneksi.php';
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user = '$id_user'");
$admin = mysqli_fetch_array($query);
$id_user = $admin['id_user'];
$username = $admin['username'];
?>

<html>
<head>
	<title>POLINEMA-Pay</title>
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
	<!--/single-->
	<div class="banner_bottom read_page py-5 my-md-5">
		<div class="container" >
			<div class="heading">
				<h1 class="heading text-capitalize mb-5 pb-3"><span>PROFIL</span></h1>
				<h4 class="position cont">ADMIN</h4>
			</div>
			<div><p>&nbsp;</p></div>
			<div class="inner_sec_info_agile_w3_info" style="border: 4px double black; color: black ">
				<div align="right"><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></div>
				<div class="read_img" align="center" >
					<img src="gambar/user.png" style="border-radius: 99em; border: 1px solid #089975; box-shadow: 1px 1px 1px 4px rgb(255, 255, 255); padding: 4px; width: 200px"/>
					<p class="para mt-2"><i class=""></i>&nbsp;
						<strong></strong> <P></P> <?php echo $username?></p>
				</div>
				<div><p>&nbsp;</p></div>
			</div>
		</div>
	</div>
	<!--//single-->


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
	</html>