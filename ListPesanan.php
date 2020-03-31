<?php
require_once 'include/Config.php';

// Connecting to mysql database
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if(mysqli_connect_errno($con)) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
} 
 
// query the application data
$sql = "SELECT * FROM permintaanjemputsampah WHERE status='Valid'";
$result = mysqli_query($con, $sql);
 
// an array to save the application data
$rows = array();
 
// iterate to query result and add every rows into array
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rows[] = $row; 
}
 
// close the database connection
mysqli_close($con);
 
// echo the application data in json format
echo json_encode($rows);