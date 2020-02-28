<?php  
	
	require_once 'koneksi.php';
	
	$sql = "SELECT * FROM data_laporan";

	$result = array();
	$r = mysqli_query($connect,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"teknisi" => $row['teknisi'],
				"nip" => $row['nip'],
				"tanggal_kegiatan" => $row['tanggal_kegiatan'],
				"nama_kegiatan" => $row['nama_kegiatan'],
				"jam" => $row['jam'],
				"kode_perbaikan" => $row['kode_perbaikan']
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($connect);

?>