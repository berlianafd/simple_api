<!DOCTYPE html>
<html>
<head>
	<?php
		include 'part/header.php';
		include 'koneksi.php';
		if (empty($_SESSION['tipe'] == "")) {
	// header("location:index.php?pesan=user_auth"); // jika belum login, maka dikembalikan ke file index.php
	}
	else {
	// Load data dari tabel
		$result = mysqli_query($mysqli, "SELECT * FROM permintaanjemputsampah ORDER BY id");
	}
	?>

	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

</head>

<body>
<section class="hero-section set-bg" data-setbg="" >
	<div class="container">
		<div class="row">
			<div class="box box-solid" style="background-color: rgb(204, 196, 193);">
				<center><h2>Data Permintaan Jemput Sampah</h2></center>
				<div class="box-body">
					<table class="table table-bordered">
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
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($user_data = mysqli_fetch_array($result)) {
								echo "<tr>";
								echo "<td>".$user_data['id']."</td>";
								echo "<td>".$user_data['idUser']."</td>";
								echo "<td>".$user_data['namaAcara']."</td>";
								echo "<td>".$user_data['notelp']."</td>";
								echo "<td>".$user_data['alamat']."</td>";
								echo "<td>".$user_data['kecamatan']."</td>";
								echo "<td>".$user_data['kelurahan']."</td>";
								echo "<td>".$user_data['tanggal']."</td>";
								echo "<td>".$user_data['waktu']."</td>";
								echo "<td>".$user_data['perkiraanBeratSampah']."</td>";
								echo "<td><img style='width:100px; height:auto' src=gambar/".$user_data['fotoDokumen']." class='img img-rounded img-thumbnail'></td>";
								echo "<td>".$user_data['Status']."</td>";
								echo "<td><a class='btn btn-success' href='terima.php'?id=$user_data[id]'><i class='fa fa-check'></i> Terima</a> | <a class='btn btn-danger' href='?id=$user_data[id]'><i class='fa fa-close'></i> Tolak</a>
								</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Services section end -->

</body>
</html>