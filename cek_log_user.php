<?php
include 'loginuser/koneksi.php';
$username   = $_POST['username'];
$password   = md5($_POST['password']);
$cek        = mysqli_query($connect, "select * from data_pengguna where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);

// var_dump($nip,$password,$hak_akses,$result);
// exit();
if($result>0){
	session_start();
    $user = mysqli_fetch_array($cek);
    $_SESSION['nip'] = $user['nip'];
    header("location:dashboard_user.php");
}else{
    header("location:index.php");
}
?>