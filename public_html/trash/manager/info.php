<?php 
	if (isset($_GET['wallet'])) {
		$wallet = $_GET['wallet'];
		$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
		if (!$connecDB) {
			die("Connect error: " . mysqli_connect_error());
		} else {
			$select_usercoins = mysqli_query($connecDB, "SELECT * FROM usercoins WHERE wallet = '$wallet'");
			if (mysqli_num_rows($select_usercoins) > 0) {
			    $row = mysqli_fetch_assoc($select_usercoins);
			    echo $row['total'];
			}
		}
		mysqli_close($connecDB);
	}
 ?>