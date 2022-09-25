<?php 
/*
	$connecDB = mysqli_connect("localhost", "sa", "9I0t6I9j", "coincash");
	if (!$connecDB) {
		die("Connect error: " . mysqli_connect_error());
	} else {
		$select_usercoins = mysqli_query($connecDB, "SELECT * FROM usercoins ORDER BY id ASC");
		if (mysqli_num_rows($select_usercoins) > 0) {
		    while($row = mysqli_fetch_assoc($select_usercoins)) {
		        //echo "</br>id: " . $row["id"]. " - wallet: " . $row["wallet"] . "- a: " . $row["a"];
		    	$wallet = $row['wallet'];
		    	$total = $row['total'];
		    	$a = $row['a'];
		    	$b = $row['b'];
		       	$c = _paylist($wallet);
		       	$value = $c - $b;
		       	if ($value > 0) {
		       		$a = $b;
		       		$b = $c;
		       		$total += $value;
		       		if (mysqli_query($connecDB, "UPDATE usercoins SET total = $total, available = $total, a = $a, b = $b WHERE wallet = '$wallet'")) {
			       		echo "</br>Đã cập nhật $value coins cho ví $wallet</br>";
			        }
		       	}	
		        elseif ($value < 0) {
		       		$a = $b;
		       		$b = $c;
		       		mysqli_query($connecDB, "UPDATE usercoins SET a = $a, b = $b WHERE wallet = '$wallet'");
		       		echo "</br>Đã cập nhật lại a = $a và b = $b cho ví $wallet</br>"; 
		        }
		    }
		}
	}
	mysqli_close($connecDB);
*/
	$connecDB = mysqli_connect("localhost", "coincas1_user", "TWXt3LQX3l2~", "coincas1_database");
	if (!$connecDB) {
		die("Connect error: " . mysqli_connect_error());
	} else {
		$select_usercoins = mysqli_query($connecDB, "SELECT * FROM usercoins ORDER BY id ASC");
		if (mysqli_num_rows($select_usercoins) > 0) {
		    while($row = mysqli_fetch_assoc($select_usercoins)) {
		    	$wallet = $row['wallet'];
		    	$total = $row['total'];
		    	$b = $row['b'];
		       	$c = _paylist($wallet);
		       	$value = $c - $b;
		       	if ($value > 0) {
		  
		       		$b = $c;
		       		$total += $value;
		       		if (mysqli_query($connecDB, "UPDATE usercoins SET total = $total, b = $b WHERE wallet = '$wallet'")) {
			       		echo "</br>Đã cập nhật $value coins cho ví $wallet</br>";
			        }
		       	}	
		        elseif ($value < 0) {
		       		$b = $c;
		       		mysqli_query($connecDB, "UPDATE usercoins SET b = $b WHERE wallet = '$wallet'");
		       		echo "</br>Đã cập nhật lại b = $b cho ví $wallet</br>"; 
		        }
		    }
		}
	}
	mysqli_close($connecDB);
function _paylist($wallet)
{
	$claims = 0;
	try {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://faucet.raiblockscommunity.net/paylist.php?acc=' . $wallet .'&json=1');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec ($ch); 
		curl_close ($ch);
		$payout_raw = json_decode($response);
		$acc_payout = $payout_raw->pending;
		if ($acc_payout) $claims = $acc_payout[0]->{'pending'}; 
		return $claims;
	} catch (Exception $e) {
		return 'error';
	}
}
?>