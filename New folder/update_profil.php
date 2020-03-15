<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['idUser']) && isset($_POST['nohp']) && isset($_POST['nama']) ) {
	
	$nohp = htmlspecialchars($_POST['nohp']);
	$nama = htmlspecialchars($_POST['nama']);
  $idUser =  htmlspecialchars($_POST['idUser']);

	$sql = $MySQLiconn->query("SELECT * FROM users WHERE id_user=$idUser");

	if(mysqli_num_rows($sql) > 0){
    while($row = $sql->fetch_array()){
      $idUser = $row['id_user'];
      $response["error"] = FALSE;
      $response["message"] = $idUser;

      $sql1 = $MySQLiconn->query("UPDATE users SET firstname='$nama', nohp='$nohp'  WHERE id_user='$idUser'"); 
      if($sql1) {
        $response["error"] = FALSE;
        $response["message"] = "Update Successfull";
        $response["data"]["firstname"] = $nama;
        $response["data"]["nohp"] = $nohp;
      } 
    }
    echo json_encode($response);
  }else{
    $response["error"] = TRUE;
    $response["message"] = "Update Failure";
    echo json_encode($response);
  }
}

?>