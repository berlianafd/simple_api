<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "simple_db";

$koneksi = mysqli_connect($host, $user, $password) or die(mysqli_error());
$db_select = mysqli_select_db($koneksi, $db) or die(mysqli_error($koneksi));

?>
