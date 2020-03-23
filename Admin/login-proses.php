<?php
include ('inc/koneksi.php');
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
	if (empty($_POST['user']) AND empty($_POST['password'])) {
		echo "Form Tidak Boleh Kosong";
	}
	else {
		
		$user = $_POST['user'];
		$password =  $_POST['password'];
		$sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
		$query = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($query);
		//$username = mysql_real_escape_string($_POST[username]);
		echo "ok";
		if ($data[username] == $user) {
			$_SESSION['username'] = $user;
			$_SESSION['id_user'] = $data[id_user];
			$_SESSION['password'] = $password;
			if ($data[id_user] > 0) {
				header('location:./index-admin.php');
				echo "ok1";
			}
			// else{
			// 	header('location:./indexnonadmin.php');
			// }

			//header('location:./index.php');
			//echo "<a href = 'index.php'>";
		}
		else {
			echo "Username Dan Password Salah !!<br>";
			echo "<a href='login.php'>Kembali</a>";
		}
	}
}
?>