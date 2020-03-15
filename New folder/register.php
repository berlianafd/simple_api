<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	// $email = htmlspecialchars($_POST['email']);
	$nohp = htmlspecialchars($_POST['nohp']);
	$password = htmlspecialchars($_POST['password']);
	
	$encrypted_password = hash("sha256", $password);// encrypted password
    
    // $sql = $MySQLiconn->query("SELECT email from users WHERE email = '$email'");
    $sql = $MySQLiconn->query("SELECT nohp from users WHERE nohp = '$nohp'");

    if(mysqli_num_rows($sql) > 0) {
		$response["error"] = TRUE;
        $response["message"] = "User already existed";

        echo json_encode($response);
    }else{
    	$sql = $MySQLiconn->query("INSERT INTO users(firstname, lastname, nohp, password, created_at) VALUES('$firstname', '$lastname', '$nohp', '$encrypted_password', NOW())"); 

	    if($sql) {
	        $response["error"] = FALSE;
	        $response["message"] = "Register Successfull";

			echo json_encode($response);
	    } else {
	    	$response["error"] = TRUE;
	        $response["message"] = "Register Failure";

			echo json_encode($response);
	    }  
	
    }
    
}
?>