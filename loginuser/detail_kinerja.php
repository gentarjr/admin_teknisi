<?php  
	
	require_once 'koneksi.php';
	
	$sql = "SELECT * FROM kinerja_teknisi";

	$result = array();
	$r = mysqli_query($connect,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"teknisi" => $row['teknisi'],
				"nip" => $row['nip'],
				"bulan" => $row['bulan'],
				"predikat" => $row['predikat']
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($connect);

?>