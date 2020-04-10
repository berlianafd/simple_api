<?php

require_once 'include/Config.php';

// Connecting to mysql database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $DefaultId = 0;

 // receiving the post params
   $idUser = $_POST['idUser'];
   $namaAcara = $_POST['namaAcara'];
   $nohp = $_POST['nohp'];
   $alamat = $_POST['alamat'];
   $kecamatan = $_POST['kecamatan'];
   $kelurahan = $_POST['kelurahan'];
   $tanggal = $_POST['tanggal'];
   $waktu = $_POST['waktu'];
   $perkiraanBeratSampah = $_POST['perkiraanBeratSampah'];

   $ImageData = $_POST['image_data'];
   $ImageName = $_POST['image_tag'];
   $ImagePath = "upload/DokumenPenunjang/$ImageName.jpg";
   $ServerURL = "http://192.168.43.10:8080/simple_api/$ImagePath";

   $InsertSQL = "INSERT INTO permintaanjemputsampah(idUser, namaAcara, notelp, alamat, kecamatan, kelurahan, tanggal, waktu, perkiraanBeratSampah, image_path, image_name, created_at) values('$idUser', '$namaAcara', '$nohp', '$alamat', '$kecamatan', '$kelurahan', '$tanggal', '$waktu', '$perkiraanBeratSampah', '$ServerURL', '$ImageName', NOW())";

   if(mysqli_query($conn, $InsertSQL)){

       file_put_contents($ImagePath,base64_decode($ImageData));

       echo "Permintaan Jemput Sampah Diproses!";
   }

   mysqli_close($conn);
}else{
   echo "Coba lagi.";
}
?>

