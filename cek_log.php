<?php
include 'loginuser/koneksi.php';
$nip   = $_POST['nip'];
$password   = md5($_POST['password']);
$cek        = mysqli_query($connect, "select * from data_pengguna where nip='$nip' and password='$password' and hak_akses = 'ADMIN'");
$result   = mysqli_num_rows($cek);

// var_dump($nip,$password,$hak_akses,$result);
// exit();
if($result>0){
	session_start();
    $user = mysqli_fetch_array($cek);
    $_SESSION['nip'] = $user['nip'];
    header("location:dashboard.php");
}else{
    header("location:index.php");
}
?>