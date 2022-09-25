<?php 
	session_start();
    $api_url  = 'https://www.google.com/recaptcha/api/siteverify';
	$secret_key  = '6LeivCQUAAAAAPwIhvdnDZRCKCPSDGqxyhSx9vFT';

	if (isset($_POST['g-recaptcha-response']) && isset($_POST['type-payment'])) {
	    $site_key_post = $_POST['g-recaptcha-response'];

	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    } else {
	        $remoteip = $_SERVER['REMOTE_ADDR'];
	    }

	    $api_url = $api_url . '?secret=' . $secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
	    $response = file_get_contents($api_url);
	    $response = json_decode($response);

	    if($response->success) {
	    	$type_payment = $_POST['type-payment'];
    		switch ($type_payment) {
    			case 'card':
    				$amount_card = $_POST['amount-card'];
    				$type_card = $_POST['type-card'];

    				$content = $amount_card . ' - ' . $type_card;
    				_payment($type_payment, $amount_card, $content);
    				break;
    			
    			case 'bank':
    				$amount_bank = $_POST['amount-bank'];
    				$province_bank = $_POST['province-bank'];
    				$account_number_bank = $_POST['account-number-bank'];
    				$account_holder_bank = $_POST['account-holder-bank'];
    				$name_bank = $_POST['name-bank'];
    				$branch_bank = $_POST['branch-bank'];
    				$card_number_bank = $_POST['card-number-bank'];
    				

    				$content = $amount_bank . ' - ' . $province_bank . ' - ' . $account_number_bank . ' - ' . $account_holder_bank . ' - ' . $name_bank . ' - ' . $branch_bank . ' - ' . $card_number_bank;
    				_payment($type_payment, $amount_bank, $content);
    				break;

    			case '365':
    				$amount_365 = $_POST['amount-365'];
    				$phone_365 = $_POST['phone-365'];
    				$name_365 = $_POST['name-365'];

    				$content = $amount_365 . ' - ' . $phone_365 . ' - ' . $name_365;
    				_payment($type_payment, $amount_365, $content);
    				break;
    		}
	    } else {
	        echo '_CAPTCHA_';
	    }
	}

	function _payment($type_payment, $amount, $request_content) {
		$user_id = $_SESSION["id"];
	    $fb_id = $_SESSION['fb_id'];
	    $user_wallet = $_SESSION['wallet'];
	    $gettime = date("Y-m-d H:i:s");
		$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
		if (!$connecDB) {

			die("Connect error: " . mysqli_connect_error());
		} else {

			$select_money = mysqli_query($connecDB, "SELECT * FROM usercoins WHERE wallet='$user_wallet'");

			$row = mysqli_fetch_assoc($select_money);
			
		
				
			if($row['total'] < 7000) {
				echo "_COIN_"; 
				GOTO RET;
			}

			
    		if ($amount <= $row['available']) {
                /*
			    $sql = "INSERT INTO payments (u_id, fb_id, type, amount, request_content, request_date, status) VALUES ($user_id, '$fb_id', '$type_payment', $amount, '$request_content', '$gettime', 'Chờ duyệt')";			   
			    if (mysqli_query($connecDB, $sql)) {
			        if(mysqli_query($connecDB, "UPDATE usercoins SET available=available-$amount, payment=payment+$amount WHERE id=$user_id AND wallet='$user_wallet'")) {
				   	 	echo "_OK_";
				    	GOTO RET;
					}
			    }*/
			    $sql="UPDATE usercoins SET available=available-$amount, payment=payment+$amount WHERE id=$user_id AND wallet='$user_wallet'";
			    if (mysqli_query($connecDB, $sql)) {
			        if(mysqli_query($connecDB, "INSERT INTO payments (u_id, fb_id, type, amount, request_content, request_date, status) VALUES ($user_id, '$fb_id', '$type_payment', $amount, '$request_content', '$gettime', 'Chờ duyệt')")) {
				   	 	echo "_OK_";
				    	GOTO RET;
					}
			    }
			} else {

			    echo "_MONEY_";
			    GOTO RET;
			}
			
		}
		RET:
		mysqli_close($connecDB);
	}
?>	