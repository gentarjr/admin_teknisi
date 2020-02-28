<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$id   = $_POST['id'];
$kegiatan            = $_POST['kegiatan'];
// query SQL untuk insert data
$query="UPDATE kode_perbaikan SET kegiatan='$kegiatan' where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:kode_perbaikan.php");
?>