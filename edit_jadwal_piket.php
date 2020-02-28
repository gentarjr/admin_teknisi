<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$teknisi   = $_POST['teknisi'];
$nip            = $_POST['nip'];
$jam           = $_POST['jam'];
$shift = $_POST['shift'];
$id = $_POST['id'];
// query SQL untuk insert data
$query="UPDATE jadwal_piket SET teknisi='$teknisi',nip='$nip',jam='$jam',shift='$shift' where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:jadwal_piket.php");
?>