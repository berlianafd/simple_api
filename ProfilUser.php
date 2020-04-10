<?php

require_once 'include/Config.php';

// Connecting to mysql database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $DefaultId = 0;

 // receiving the post params
   $idUser = $_POST['idUser'];
   $nama = $_POST['nama'];
   $nohp = $_POST['nohp'];
   $ImageData = $_POST['image_data'];
   $ImageName = $_POST['image_tag'];
   $ImagePath = "upload/FotoProfil/$ImageName.jpg";
   $ServerURL = "http://192.168.43.10:8080/simple_api/$ImagePath";

   $InsertSQL = "UPDATE user SET name='$nama', nohp='$nohp', image_path='$ServerURL', image_name='$ImageName', updated_at=NOW() WHERE id='$idUser' ";

   if(mysqli_query($conn, $InsertSQL)){

       file_put_contents($ImagePath,base64_decode($ImageData));

       echo "Profil berhasil diperbarui";
   }

   mysqli_close($conn);
}else{
   echo "Coba lagi.";
}
?>

