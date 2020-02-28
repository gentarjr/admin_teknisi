<?php
include 'loginuser/koneksi.php';
// menyimpan data id kedalam variabel
$id  = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from kinerja_teknisi where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:kinerja_teknisi.php");
?>