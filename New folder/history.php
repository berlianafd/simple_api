<?php 
  
	//Import File Koneksi Database
	include_once 'connect.php';
	
	//Membuat SQL Query
	$sql = "SELECT * FROM totalpoinuser";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"jenis"=>$row['jenisSampah'],
		"berat"=>$row['beratSampah'],
		"tgl"=>$row['created_at']
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>