<?php

include_once 'connect.php';

$response = array("error" => FALSE);

if (isset($_POST['nohp'])) {
	
	$nohp = htmlspecialchars($_POST['nohp']);
	// $password = htmlspecialchars($_POST['password']);

	// $encrypted_password = hash("sha256", $password);// encrypted password

	$sql = $MySQLiconn->query("SELECT * FROM users WHERE nohp='$nohp'");

	if(mysqli_num_rows($sql) > 0){
		while($row = $sql->fetch_array()){
      $response["error"] = FALSE;
      $response["message"] = "Login Successfull";
      $response["data"]["idUser"] = $row['id_user'];
      $response["data"]["level"] = $row['level'];
      $response["data"]["firstname"] = $row['firstname'];
      $response["data"]["nohp"] = $nohp;
      $idUser = $row['id_user'];

      $sql1 = $MySQLiconn->query("SELECT totalBeratSampah,totalPoin FROM totalpoinuser WHERE idUser=$idUser"); 
      if(mysqli_num_rows($sql1) > 0){
        while($row = $sql1 ->fetch_array()){
          $response["data"]["totalBeratSampah"] = $row['totalBeratSampah'];
          $response["data"]["totalPoin"] = $row['totalPoin'];
        }
      }
    }
    echo json_encode($response);
  }else{

    $sql = $MySQLiconn->query("INSERT INTO users(nohp, level, created_at) VALUES('$nohp', 1,NOW())"); 

    if($sql) {
      $response["error"] = FALSE;
      $response["message"] = "Register Successfull";

      $sql1 = $MySQLiconn->query("SELECT id_user FROM users WHERE nohp='$nohp'"); 
      if(mysqli_num_rows($sql1) > 0){
        while($row = $sql1 ->fetch_array()){
         $response["data"]["idUser"] = $row['id_user'];
         $response["data"]["level"] = $row['level'];
         $idUser = $row['id_user'];

          $sql2 = $MySQLiconn->query("INSERT INTO totalPoinUser(idUser, totalBeratSampah, totalPoin) VALUES('$idUser', 0, 0)"); 
       }
     }

    

     echo json_encode($response);
   } else {
    $response["error"] = TRUE;
    $response["message"] = "Register Failure";

    echo json_encode($response);
  }  
}
}

?>