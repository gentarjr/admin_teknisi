<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$id   = $_POST['id'];
$kegiatan            = $_POST['kegiatan'];
// query SQL untuk insert data
$query="UPDATE nama_kegiatan SET kegiatan='$kegiatan' where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:nama_kegiatan.php");
?>