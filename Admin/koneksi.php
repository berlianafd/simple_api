<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_db";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname); 
if(mysqli_connect_errno()){
    echo "Koneksi gagal, ada masalah pada: ".mysqli_connect_error();
    exit();
    mysqli_close($mysqli);
}

?>
