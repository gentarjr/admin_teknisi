<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "aplikasi_teknisi";
$connect  = mysqli_connect($host, $user, $password,$database);
if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
		}
?>