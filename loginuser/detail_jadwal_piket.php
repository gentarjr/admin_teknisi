<?php  
	
	require_once 'koneksi.php';
	
	$sql = "SELECT * FROM jadwal_piket";

	$result = array();
	$r = mysqli_query($connect,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"teknisi" => $row['teknisi'],
				"nip" => $row['nip'],
				"jam" => $row['jam'],
				"shift" => $row['shift']
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($connect);

?>