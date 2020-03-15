<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['noMesin']) && isset($_POST['jenisSampah']) && isset($_POST['beratSampah'])) {
	$idUser = ($_POST['idUser']);
	$noMesin = ($_POST['noMesin']);
	$jenisSampah = ($_POST['jenisSampah']);
	$beratSampah = ($_POST['beratSampah']);

	 // create a new transaksi buang sampah user
	$user = $db->storeTransactionBuang($idUser, $noMesin, $jenisSampah, $beratSampah);
	if ($user) {
		// $response["error"] = FALSE;
		// $response["user"]["id"] = $user["idUser"];
		// $response["user"]["noMesin"] = $user["noMesin"];
		// $response["user"]["jenisSampah"] = $user["jenisSampah"];
		// $response["user"]["beratSampah"] = $user["beratSampah"];
		// echo json_encode($response);

		$user1 = $db->getTotalPoinUser($idUser);
		if ($user1) {
            // user stored successfully
			$tbsLama = $user1["totalBeratSampah"];
			$tbkLama = $user1["totalBeratKertas"];
			$tbPLama = $user1["totalBeratPlastik"];
			$tpLama = $user1["totalPoin"];

			//konversi berat ke poin
			$konvpoin = $beratSampah*1;

			//penambahan poin
			$tbsBaru = $tbsLama + $beratSampah;
			$tpBaru = $tpLama + $konvpoin;
			if($jenisSampah==1){
				$tbkBaru = $tbkLama + $beratSampah;
				$tbpBaru = $tbPLama;
			} else {
				$tbkBaru = $tbkLama;
				$tbpBaru = $tbPLama + $beratSampah;
			}
			// $response["user"]["totalBeratSampahBr"] = $tbsBaru;
			// $response["user"]["totalBeratKertasBr"] =$tbkBaru;
			// $response["user"]["totalBeratPlastikBr"] = $tbpBaru;
			// $response["user"]["totalPoinBr"] = $tpBaru;
			// echo json_encode($response);
			
			$user2 = $db->storeTotalPoinUser($idUser, $tbsBaru, $tbkBaru, $tbpBaru, $tpBaru);
			if ($user2) {
            // user stored successfully
				$response["error"] = FALSE;
				$response["user"]["id"] = $user2["idUser"];
				$response["user"]["totalBeratSampah"] = $user2["totalBeratSampah"];
				$response["user"]["totalBeratKertas"] = $user2["totalBeratKertas"];
				$response["user"]["totalBeratPlastik"] = $user2["totalBeratPlastik"];
				$response["user"]["totalPoin"] = $user2["totalPoin"];
				echo json_encode($response);
			} else {
            // user failed to store
				$response["error"] = TRUE;
				$response["error_msg"] = "Unknown error occurred in update total poin!";
				echo json_encode($response);
			}

		} else {
            // user failed to store
			$response["error"] = TRUE;
			$response["error_msg"] = "Unknown error occurred in get total poin!";
			echo json_encode($response);
		}
	} else {
            // user failed to store
		$response["error"] = TRUE;
		$response["error_msg"] = "Transaksi Sampah Gagal!";
		echo json_encode($response);
	}	
}

?>