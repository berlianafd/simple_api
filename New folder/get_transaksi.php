<?php
 
/*
 * Following code will get single transaksi details
 * A transaksi is identified by transaksi id (idUser)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
include_once 'connect.php';
 
// check for post data
if (isset($_GET["idUser"])) {
    $idUser = $_GET['idUser'];
 
    // get a transaksi from transaksis table
    $result = $MySQLiconn->query("SELECT *FROM transaksisampah WHERE idUser = $idUser");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
 
            $result = mysqli_fetch_array($result);
 
            $transaksi = array();
            $transaksi["idUser"] = $result["idUser"];
            // $transaksi["noMesin"] = $result["noMesin"];
            $transaksi["jenisSampah"] = $result["jenisSampah"];
            $transaksi["beratSampah"] = $result["beratSampah"];
            // $transaksi["created_at"] = $result["created_at"];
            // success
            $response["success"] = 1;
 
            // user node
            $response["transaksi"] = array();
 
            array_push($response["transaksi"], $transaksi);
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no transaksi found
            $response["success"] = 0;
            $response["message"] = "No transaksi found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no transaksi found
        $response["success"] = 0;
        $response["message"] = "No transaksi found";
 
        // echo no users JSON
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