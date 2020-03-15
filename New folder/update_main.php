<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['idUser'])) {
	
	$idUser = htmlspecialchars($_POST['idUser']);

	$sql = $MySQLiconn->query("SELECT totalBeratSampah,totalPoin FROM totalpoinuser WHERE idUser='$idUser'");

	if(mysqli_num_rows($sql) > 0){
		while($row = $sql->fetch_array()){
      $response["error"] = FALSE;
      $response["message"] = "Update Main Successfull";
      $response["data"]["totalBeratSampah"] = $row['totalBeratSampah'];
      $response["data"]["totalPoin"] = $row['totalPoin'];
    }
    echo json_encode($response);
  }else{
    $response["error"] = TRUE;
    $response["message"] = "Update Main Failure";

    echo json_encode($response);
  }  
}
?>