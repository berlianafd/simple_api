<?php
require_once 'include/Config.php';

// Connecting to mysql database
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if(mysqli_connect_errno($con)) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
} 

$idSukarelawan = 3;
 
// query the application data
$sql = "SELECT * FROM permintaanjemputsampah as p INNER JOIN tugasjemputsampah as t ON p.id=t.idJemput WHERE t.idSukarelawan=$idSukarelawan";
$result = mysqli_query($con, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
 
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