<?php 

	if (isset($_GET['from']) && is_numeric($_GET['from'])){	
		request($_GET['from']);
	} else {
		echo ":V tào lao";
	}

	function request($from){
		$connecDB = mysqli_connect("localhost", "coincas1_user", "TWXt3LQX3l2~", "coincas1_database");
		if (!$connecDB) {
			die("Connect error: " . mysqli_connect_error());
		} else {
			$slrate = mysqli_query($connecDB, "SELECT rate FROM info");
			$rate = mysqli_fetch_row($slrate)[0];
			if (!$rate) die ("Error get rate");
			$select = mysqli_query($connecDB, "SELECT account, user_id, total_money, current_money, total_coin, temp_claim, old_claim FROM user, wallet ORDER BY update_date ASC LIMIT $from,10");// Get cái mô có ví /=> Cần sửa lại có john đồ nữa

			if (mysqli_num_rows($select) > 0) {
			    while($row = mysqli_fetch_assoc($select)) {
			    	$user_id = $row['user_id'];
			    	$account = $row['account'];
			    	$total_money = $row['total_money'];
			    	$current_money = $row['current_money'];
			    	$total_coin = $row['total_coin'];
			    	
			    	$temp_claim = $row['temp_claim'];
			    	$old_claim = $row['old_claim']; //pending claim trước get ở paylist lần trước
			       	$new_claim = _paylist($account);
			       	if ($new_claim==-1) continue;

			       	if ($new_claim > $old_claim) {
			       		$value = $new_claim - $old_claim;
			       		
			       		$temp_claim += $value;
			       		$total_coin += $value;
			       		$old_claim = $new_claim;
			       		//Cập nhật tiền
			       		$total_money += $value * $rate;
						$current_money += $value * $rate;
						_update_coin($connecDB, $user_id, $total_money, $current_money, $total_coin, $temp_claim, $old_claim);
			       	} else if ($new_claim < $old_claim) {//Đã được paid mrai
			       		$paid_claim = _get_history_paid(); //lấy số claim lần thanh toán gần nhất
			       		
			       		$temp_claim -= $paid_claim;
			       		$total_coin += $temp_claim; 
			       		$old_claim = $new_claim;
			       		//Cập nhật tiền
			       		$total_money += $temp_claim * $rate;
			       		$current_money += $value * $rate;
			       		_update_coin($connecDB, $user_id, $total_money, $current_money, $total_coin, $temp_claim, $old_claim);
						mysqli_query($connecDB, "UPDATE wallets SET total_claim = total_claim + $paid_claim WHERE account = $account");
			       	} else { // ==
			       		//Méo làm gì
			       	} 	
			    }
			}
		}
		mysqli_close($connecDB);
	}

	function _update_coin($connecDB, $user_id, $total_money, $current_money, $temp_claim, $total_coin, $pending_claim) {
		$update_date = getdate();
		$sql = "UPDATE coins SET total_money = $total_money, current_money = $current_money, total_coin = $total_coin, temp_claim = $temp_claim, pending_claim = $pending_claim, update_date = $update_date WHERE user_id = $user_id";
		if(mysqli_query($connecDB, $sql))
			echo "<br>Đã cập nhật thành công! ($user_id)";
		else
			echo "<br>Cập nhật thất bại! ($user_id)";
	}

	function _get_history_paid($account) {
		$paid_claim = 0;
		/*
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://faucet.raiblockscommunity.net/history?acc=' . $account . '&json=1');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);
			$payout_raw = json_decode($response);
			if (!$payout_raw) return -1;
			$acc_payout = $payout_raw->pending;
			if (!$acc_payout) return -1;
			$claims = $acc_payout[0]->{'pending'}; 
			return $claim;
		} catch (Exception $e) {
			return -1;
		}*/
	}

	function _paylist($account) {
		$claim = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://faucet.raiblockscommunity.net/paylist.php?acc=' . $account . '&json=1');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);
			$payout_raw = json_decode($response);
			if (!$payout_raw) return -1;
			$acc_payout = $payout_raw->pending;
			if (!$acc_payout) return -1;
			$claim = $acc_payout[0]->{'pending'}; 
			return $claim;
		} catch (Exception $e) {
			return -1;
		}
	}
	function _rate()
	{
		try {
			 $slrate = mysqli_query($connecDB, "SELECT rate FROM info");
			 return mysqli_fetch_row($slrate)[0];
		} catch (Exception $e) {
			return 0;
		}
	}

	/*     	
	$nvalue = 0;
   	if ($new_claims >= $old_claims)
   		$nvalue = $new_claims - $old_claims;	
    else 
   		$nvalue = $new_claims;
	*/
?>