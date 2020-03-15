<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['name']) && isset($_POST['nohp']) && isset($_POST['imei']) && isset($_POST['level'])) {

    // receiving the post params
    $name = $_POST['name'];
    $nohp = $_POST['nohp'];
    $imei = $_POST['imei'];
    $level = $_POST['level'];


    // check if user is already existed with the same nohp
    if ($db->isUserExisted($nohp)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $nohp;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($name, $nohp, $imei, $level);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $user["unique_id"];
            $response["user"]["name"] = $user["name"];
            $response["user"]["level"] = $user["level"];
            $response["user"]["nohp"] = $user["nohp"];
            $response["user"]["created_at"] = $user["created_at"];
            $response["user"]["updated_at"] = $user["updated_at"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, nohp or imei) is missing!";
    echo json_encode($response);
}
?>

