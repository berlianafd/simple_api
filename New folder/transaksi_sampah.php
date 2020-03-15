<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['noMesin']) && isset($_POST['jenisSampah']) && isset($_POST['beratSampah'])) {

	$beratSampah = htmlspecialchars($_POST['beratSampah']);
	$noMesin = htmlspecialchars($_POST['noMesin']);
	$jenisSampah = htmlspecialchars($_POST['jenisSampah']);
	$idUser = htmlspecialchars($_POST['idUser']);
	
	

	$sql = $MySQLiconn->query("INSERT INTO transaksisampah (idUser, noMesin, jenisSampah, beratSampah, created_at) VALUES('$idUser','$noMesin', '$jenisSampah', '$beratSampah', NOW())"); 
	if($sql) {
		$sql1 = $MySQLiconn->query("SELECT totalBeratSampah,totalPoin FROM totalpoinuser WHERE idUser='$idUser'"); 
		if(mysqli_num_rows($sql1) > 0){
			while($row = $sql1->fetch_array()){

				$response["error"] = FALSE;
				$tbsLama = $row['totalBeratSampah'];
				$tpLama = $row['totalPoin'];
				$poinBaru = $beratSampah *1;
				
				$tbsBaru = $tbsLama + $beratSampah;
				$tpBaru = $tpLama + $poinBaru;

				$sql2 = $MySQLiconn->query("UPDATE totalpoinuser SET totalBeratSampah='$tbsBaru', totalPoin='$tpBaru' WHERE idUser='$idUser'"); 
				if($sql2){
					$response["data"]["totalBeratSampah"] = $tbsBaru;
					$response["data"]["totalPoin"] = $tpBaru;
					$response["error"] = FALSE;
					$response["message"] = "Transaction Successfull";
				}
			}
			echo json_encode($response);
		}
	} else {
		$response["error"] = TRUE;
		$response["message"] = "Transaction Failure";

		echo json_encode($response);
	}
}

?>