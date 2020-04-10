<?php

require_once 'include/Config.php';

// Connecting to mysql database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $DefaultId = 0;

   $idUser = $_POST['idUser'];
   $nohp = $_POST['nohp'];

   $InsertSQL = "UPDATE user SET nohp='$nohp', updated_at=NOW() WHERE id='$idUser' ";

   if(mysqli_query($conn, $InsertSQL)){
       echo "Profil berhasil diperbarui";
   }

   mysqli_close($conn);
}else{
   echo "Coba lagi.";
}
?>

