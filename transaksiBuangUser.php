<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['noMesin']) && isset($_POST['jenisSampah']) && isset($_POST['beratSampah']) && isset($_POST['poinSampah'])) {
	$idUser = ($_POST['idUser']);
	$noMesin = ($_POST['noMesin']);
	$jenisSampah = ($_POST['jenisSampah']);
	$beratSampah = ($_POST['beratSampah']);
	$poinSampah = ($_POST['poinSampah']);
	// kode fitur tukar sampah
	$fitur="ts";

	 // create a new transaksi buang sampah user
	$user = $db->storeTransactionBuang($idUser, $noMesin, $jenisSampah, $beratSampah, $poinSampah);
	if ($user) {
		$user1 = $db->getTotalPoinUser($idUser);
		if ($user1) {
            // user stored successfully
			$tbsLama = $user1["totalBeratSampah"];
			$tbkLama = $user1["totalBeratKertas"];
			$tbPLama = $user1["totalBeratPlastik"];
			$tpLama = $user1["totalPoin"];

			//penambahan poin
			$tbsBaru = $tbsLama + $beratSampah;
			$tpBaru = $tpLama + $poinSampah;

			if($jenisSampah==1){
				$tbkBaru = $tbkLama + $beratSampah;
				$tbpBaru = $tbPLama;
			} else {
				$tbkBaru = $tbkLama;
				$tbpBaru = $tbPLama + $beratSampah;
			}
			
			$user2 = $db->storeTotalPoinUser($idUser, $tbsBaru, $tbkBaru, $tbpBaru, $tpBaru);
			if ($user2) {

				$user3 = $db->storeRiwayat($idUser, $fitur, $poinSampah);
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