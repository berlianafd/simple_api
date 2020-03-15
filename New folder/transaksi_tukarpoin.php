<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['idPenjual']) && isset($_POST['poin'])) {

	$idPenjual = htmlspecialchars($_POST['idPenjual']);
	$poin = htmlspecialchars($_POST['poin']);
	$idUser = htmlspecialchars($_POST['idUser']);


	$sql = $MySQLiconn->query("INSERT INTO transaksitukarpoin (idUser, idPenjual, poin, created_at) VALUES($idUser,$idPenjual, $poin, NOW())"); 
	if($sql) {
		$response["error"] = FALSE;
		$response["message"] = "Transaction Successfull";


		$sql1 = $MySQLiconn->query("SELECT totalPoin FROM totalpoinuser WHERE idUser=$idUser"); 
		if(mysqli_num_rows($sql1) > 0){
			while($row = $sql1->fetch_array()){

				$response["error"] = FALSE;
				$tpLama = $row['totalPoin'];
				$tpBaru = $tpLama - $poin;

				$sql2 = $MySQLiconn->query("UPDATE totalpoinuser SET totalPoin=$tpBaru WHERE idUser=$idUser"); 

				$sql3 = $MySQLiconn->query("SELECT totalPoin FROM totalpoinuser WHERE idUser=$idPenjual"); 
				if(mysqli_num_rows($sql3) > 0){
					while($row = $sql3->fetch_array()){

						$response["error"] = FALSE;
						$tpLama = $row['totalPoin'];
						$tpBaru = $tpLama + $poin;

						$sql4 = $MySQLiconn->query("UPDATE totalpoinuser SET totalPoin=$tpBaru WHERE idUser=$idPenjual"); 
						if($sql4){
							$response["data"]["totalBeratSampah"] = $row['totalBeratSampah'];
							$response["data"]["totalPoin"] = $row['totalPoin'];
							$response["error"] = FALSE;
							$response["message"] = "Transaction Successfull";
						}

					}
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