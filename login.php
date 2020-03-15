<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['nohp']) && isset($_POST['imei'])) {

    // receiving the post params
    $nohp = $_POST['nohp'];
    $imei = $_POST['imei'];

    // get the user by nohp and imei
    $user = $db->getUserBynohpAndimei($nohp, $imei);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["uid"] = $user["unique_id"];
        $response["user"]["level"] = $user["level"];        
        $response["user"]["name"] = $user["name"];
        $response["user"]["nohp"] = $user["nohp"];
        $response["user"]["created_at"] = $user["created_at"];
        $response["user"]["updated_at"] = $user["updated_at"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters nohp or imei is missing!";
    echo json_encode($response);
}
?>

