<?php  
	include "koneksi.php";
	if(isset($_POST['id'])){
		if(empty($_POST['id'])){
			$data_return = "<b> Data yang diedit tidak ada</b>";
		}
		else{
			$value  = $_POST['value'];
			$edit = mysqli_query($koneksi, "UPDATE `permintaanjemputsampah` SET `status`='{$value}' WHERE `id` = '$_POST[id]'") or die
			("Mysql Error : ".mysqli_error($koneksi));
			if ($edit){
				// header("Location: data-pemesanan.php");
				$data_return = "data berasil dirubah";
			}
		}
	}

	echo json_encode($data_return);

?>