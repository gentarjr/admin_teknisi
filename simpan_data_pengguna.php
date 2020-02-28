<?php
include 'loginuser/koneksi.php';
// menyimpan data kedalam variabel
$username      = $_POST['username'];
$hak_akses      = $_POST['hak_akses'];
$nip      = $_POST['nip'];
$password      = md5($_POST['password']);
$nama_lengkap      = $_POST['nama_lengkap'];
$no_telp      = $_POST['no_telp'];
$email      = $_POST['email'];
$divisi      = $_POST['divisi'];
// query SQL untuk insert data
$query="INSERT INTO data_pengguna (username,hak_akses,nip,password,nama_lengkap,no_telp,email,divisi) VALUES ('$username','$hak_akses','$nip','$password','$nama_lengkap','$no_telp','$email','$divisi')";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location:data_pengguna.php");
?>