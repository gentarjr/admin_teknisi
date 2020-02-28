<?php
include 'loginuser/koneksi.php';
// menyimpan data id kedalam variabel
$id  = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from jadwal_piket where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:jadwal_piket.php");
?>