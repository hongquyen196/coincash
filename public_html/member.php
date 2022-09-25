<?php 
	session_start(); 
	if(isset($_SESSION["wallet"]) OR isset($_GET["acc"])) {
		$wallet = ($_GET["acc"]?$_GET["acc"]:$_SESSION["wallet"]);
		$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
		if (!$connecDB) {
			die("Connect error: " . mysqli_connect_error());
		} else {
			$select_usercoins = mysqli_query($connecDB, "SELECT wallet, total, available FROM usercoins WHERE wallet = '$wallet'");
			if (mysqli_num_rows($select_usercoins) > 0) {
			    $row = mysqli_fetch_assoc($select_usercoins);
			    echo json_encode($row);
			}
		}
		mysqli_close($connecDB);
	} else {
		echo json_encode(array("error" => -1));
	}

 ?>