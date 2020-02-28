<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$teknisi      = $_POST['teknisi'];
$nip      = $_POST['nip'];
$bulan      = $_POST['bulan'];
list($h,$m,$s) = explode(":",$_POST['waktu_mulai']);
$waktu_mulai = mktime($h,$m,$s,"1","1","1");
list($h,$m,$s) = explode(":",$_POST['waktu_selesai']);
$waktu_selesai = mktime($h,$m,$s,"1","1","1");
$selisih = $waktu_selesai-$waktu_mulai;
$predikat = $selisih/60;
// query SQL untuk insert data
$query="INSERT INTO kinerja_teknisi (teknisi,nip,bulan,waktu_mulai,waktu_selesai,predikat) VALUES ('$teknisi','$nip','$bulan','$waktu_mulai','$waktu_selesai','$predikat')";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:kinerja_teknisi.php");
?>