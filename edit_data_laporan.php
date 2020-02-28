<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$id   				= $_POST['id'];
$teknisi            = $_POST['teknisi'];
$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$jam = $_POST['jam'];
$kode_perbaikan = $_POST['kode_perbaikan'];
// query SQL untuk insert data
$query="UPDATE data_laporan SET teknisi='$teknisi',tanggal_kegiatan='$tanggal_kegiatan',nama_kegiatan='$nama_kegiatan',jam='$jam',kode_perbaikan='$kode_perbaikan' where id='$id'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:data_laporan.php");
?>