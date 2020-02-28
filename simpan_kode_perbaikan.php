<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$kegiatan      = $_POST['kegiatan'];
// query SQL untuk insert data
$query="INSERT INTO kode_perbaikan (kegiatan) VALUES ('$kegiatan')";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:kode_perbaikan.php");
?>