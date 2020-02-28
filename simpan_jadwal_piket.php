<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$teknisi      = $_POST['teknisi'];
$nip      = $_POST['nip'];
$jam      = $_POST['jam'];
$shift      = $_POST['shift'];
// query SQL untuk insert data
$query="INSERT INTO jadwal_piket (teknisi,nip,jam,shift) VALUES ('$teknisi','$nip','$jam','$shift')";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:jadwal_piket.php");
?>