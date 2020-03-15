<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['email']) && isset($_POST['password']) ) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = hash("sha256", $password);// encrypted password

    // include db connect class
    include_once 'connect.php';

    // mysql inserting a new row
    $result = $MySQLiconn->query("INSERT INTO users(email, password, created_at) VALUES('$email', '$encrypted_password', NOW())");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User berhasil ditambah.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        // echoing JSON response
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