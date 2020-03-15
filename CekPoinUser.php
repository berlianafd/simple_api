<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

// check for post data
if (isset($_POST["idUser"]) && isset($_POST['nohp'])) {
    $idUser = $_POST['idUser'];

	// get the user poin
    $user = $db->getUserPoint($idUser);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["user"]["totalBeratSampah"] = $user["totalBeratSampah"];
        $response["user"]["totalBeratKertas"] = $user["totalBeratKertas"];
        $response["user"]["totalBeratPlastik"] = $user["totalBeratPlastik"];
        $response["user"]["totalPoin"] = $user["totalPoin"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Tidak ada transaksi!";
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