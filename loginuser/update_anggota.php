<?php  

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$id = $_POST['id'];
		$username = $_POST['username'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$password = md5($_POST['password']);
		$divisi = $_POST['divisi'];

		$sql = "UPDATE data_pengguna SET username='$username',nama_lengkap='$nama_lengkap',email='$email',no_telp='$no_telp',password='$password',divisi='$divisi' WHERE id ='$id'";
		require_once('koneksi.php');

		if (mysqli_query($connect,$sql)) {
			echo "Selamat Data Terupdate";
		}else{
			echo mysqli_error($connect,$sql);
		}

		mysqli_close($connect);
	}
?>