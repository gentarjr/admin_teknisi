<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$kegiatan      = $_POST['kegiatan'];
// query SQL untuk insert data
$query="INSERT INTO nama_kegiatan (kegiatan) VALUES ('$kegiatan')";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:nama_kegiatan.php");
?>