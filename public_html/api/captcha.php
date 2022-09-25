<?php 

	if (isset($_POST["text"])) {

		$text = $_POST["text"];

		$connecDB = mysqli_connect("45.76.50.78", "root", "489d088b55828582e", "captcha");

		if (!$connecDB) {

			die("Connect error: " . mysqli_connect_error());

		} else {

			if(mysqli_query($connecDB, "INSERT INTO `text_captcha` (`text`, `update_date`) VALUES ('$text', NOW())")) {

				//echo "Inserted a new captcha.";

			}
		}
	}

 ?>