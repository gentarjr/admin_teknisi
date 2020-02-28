<?php
include 'loginuser/koneksi.php';
// menyimpan data id kedalam variabel
$id  = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from kode_perbaikan where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:kode_perbaikan.php");
?>