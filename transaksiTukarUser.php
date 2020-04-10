<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['idPenjual']) && isset($_POST['idYgDijual']) && isset($_POST['harga']) && isset($_POST['poin'])) {
	$idUser = ($_POST['idUser']);
	$idPenjual = ($_POST['idPenjual']);
	$idYgDijual = ($_POST['idYgDijual']);
	$harga = ($_POST['harga']);
	$poin = ($_POST['poin']);

// $idUser = 2;
// $idPenjual = 4;
// $idYgDijual = 1;
// $harga = 1500;
// $poin = 1500;
	// kode fitur tukar sampah
$fitur="tp";

	 // create a new transaksi buang sampah user
$user = $db->storeTransactionTukar($idUser, $idPenjual, $idYgDijual, $harga, $poin);
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
		$tpLama = $user1["totalPoin"];

			//penambahan poin
		$tpBaru = $tpLama - $poin;

			// $response["user"]["totalBeratSampahBr"] = $tbsBaru;
			// $response["user"]["totalBeratKertasBr"] =$tbkBaru;
			// $response["user"]["totalBeratPlastikBr"] = $tbpBaru;
			// $response["user"]["totalPoinBr"] = $tpBaru;
			// echo json_encode($response);
		
		$user2 = $db->storeTotalPoinUserTukar($idUser, $tpBaru);
		if ($user2) {
            // user stored successfully
				// $response["error"] = FALSE;
				// $response["user"]["id"] = $user2["idUser"];
				// $response["user"]["totalBeratSampah"] = $user2["totalBeratSampah"];
				// $response["user"]["totalBeratKertas"] = $user2["totalBeratKertas"];
				// $response["user"]["totalBeratPlastik"] = $user2["totalBeratPlastik"];
				// $response["user"]["totalPoin"] = $user2["totalPoin"];
				// echo json_encode($response);

			$user3 = $db->storeRiwayat($idUser, $fitur, $poin);
			if($user3){
					// user stored successfully
				$response["error"] = FALSE;
				$response["user"]["id"] = $user3["idUser"];
				echo json_encode($response);
			}else{
					 // user failed to store
				$response["error"] = TRUE;
				$response["error_msg"] = "Unknown error occurred in update history!";
				echo json_encode($response);
			}

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

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}

?>