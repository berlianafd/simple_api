<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

// check for post data
if (isset($_POST["id"])) {
    $id = $_POST['id'];

	// get the user poin
    $user = $db->getHargaKertas($id);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["user"]["harga"] = $user["harga"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Tidak ada data!";
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