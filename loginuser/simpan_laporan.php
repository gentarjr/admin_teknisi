<?php  

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$teknisi = $_POST['teknisi'];
		$nip = $_POST['nip'];
		$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
		$nama_kegiatan = $_POST['nama_kegiatan'];
		$jam = $_POST['jam'];
		$kode_perbaikan = $_POST['kode_perbaikan'];

		$sql = "INSERT INTO data_laporan (teknisi, nip, tanggal_kegiatan, nama_kegiatan, jam, kode_perbaikan) VALUES ('$teknisi','$nip','$tanggal_kegiatan','$nama_kegiatan','$jam','$kode_perbaikan')";
		require_once('koneksi.php');

		if (mysqli_query($connect,$sql)) {
			echo "Selamat Data Tersimpan";
		}else{
			echo mysqli_error($connect,$sql);
		}

		mysqli_close($connect);
	}
?>