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
	<title>POLINEMA-Pay</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Fast Service a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<style> 
		input[type=search] {
			width: 130px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url('searchicon.png');
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 40px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		input[type=search]:focus {
			width: 100%;
		}
	</style>
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
	<div>
		<p>
			&nbsp;
		</p>
	</div>
	<form id="search" action="laporan.php" method="post" >
		<input type="search" placeholder="Cari..." name="qcari">
	</form>
	<div>
		<p>
			&nbsp;
		</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Id User</th>
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
							<td><p><?php echo $menu['idUser'];?></p></td>
							<td><p><?php echo $menu['namaAcara'];?></p></td>
							<td><p><?php echo $menu['notelp'];?></p></td>
							<td><p><?php echo $menu['alamat'];?></p></td>
							<td><p><?php echo $menu['kecamatan'];?></p></td>
							<td><p><?php echo $menu['kelurahan'];?></p></td>
							<td><p><?php echo $menu['tanggal'];?></p></td>
							<td><p><?php echo $menu['waktu'];?></p></td>
							<td><p><?php echo $menu['perkiraanBeratSampah'];?></p></td>
							<td><p><?php echo "<img src='gambar/$menu[fotoDokumen]'width='70' height='50'/>";?></p></td>
							<td><p><?php echo $menu['Status'];?></p></td>						
							<td>
								<select class="btn btn-secondary btn-sm dropdown-toggle" onchange="status(<?php echo $menu['id'] ?>)" 
									id="<?php echo 'Status' . $menu['id'] ?>"style="width: auto;">
									<option value="terima">Terima</option>
									<option value="tolak">Tolak</option>
									<?php foreach ($pilih_status as $Status): 
										$selected   = ( $menu['Status'] == $Status['value'] )? 'selected' : false;
										?>
										<option value="<?php echo $Status['value'] ?>" 
											<?php echo $selected ?>><?php echo $Status['label'] ?>
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
		function status (id){
			var aksi = $('#aksistatus' + id ).val();	
			$.ajax({
				url: 'status-data-pesanan.php',
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
