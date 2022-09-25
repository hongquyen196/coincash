<?php 

	if (isset($_GET['from']) && is_numeric($_GET['from'])){	
		request($_GET['from']);
	} else {
		echo ":V tào lao";
	}

	function request($from){
		$connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
		if (!$connecDB) {
			die("Connect error: " . mysqli_connect_error());
		} else {
			$slrate = mysqli_query($connecDB, "SELECT rate FROM info");
			$rate = mysqli_fetch_row($slrate)[0];
			if (!$rate) die ("Error get rate");
			$select_usercoins = mysqli_query($connecDB, "SELECT * FROM usercoins ORDER BY id ASC LIMIT $from,10");
			if (mysqli_num_rows($select_usercoins) > 0) {
			    while($row = mysqli_fetch_assoc($select_usercoins)) {
			    	$wallet = $row['wallet'];
			    	$money = $row['money'];
			    	$total = $row['total'];
			    	$available = $row['available'];
			    
			    	$old_claim = $row['old_claim'];
			       	$new_claim = _paylist($wallet);
			       	if ($new_claim <= 0) continue; //-1 hoặc 0

					$nvalue = 0;
				   	if ($new_claim > $old_claim) {
				   		$nvalue = $new_claim - $old_claim;	
				   		//if ($nvalue > 30) continue; 
			        	$money = $money + $nvalue * $rate;
			        	$available = $available + $nvalue * $rate;	
			        	$total = $total + $nvalue;					  	
					}
					echo "{$row['id']} - $wallet - total: $total - newc: $new_claim - oldc: $old_claim";
					if(mysqli_query($connecDB, "update usercoins set money=$money, available=$available, total=$total, old_claim=$new_claim where wallet='$wallet'")) {
					     echo " ==> Đã cập nhật $nvalue coin<br>";
				    }
			

			       	/*
			        $nvalue = ($new_claim >= $old_claim ? $new_claim - $old_claim : $new_claim);
			        if ($nvalue > 0 && $nvalue < 400) {
			        	$money = $money + $nvalue * $rate;
			        	$navailable = $available + $nvalue * $rate;

			        	if(mysqli_query($connecDB, "update usercoins set money=$money, available=$navailable, total=total+$nvalue, old_claim=$new_claim where wallet='$wallet'")) {
				       		echo "<br>Đã cập nhật $nvalue coins cho {$row['id']} - $wallet - total: $total - newc: $new_claim - oldc: $old_claim<br>";
				        }
				    } else {
				    	echo "<br>{$row['id']} - $wallet - total: $total - newc: $new_claim - oldc: $old_claim<br>";
				    }   	
				   	*/
				}
			}
		}
		mysqli_close($connecDB);
	}

	function _paylist($wallet) {
		$claims = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://faucet.raiblockscommunity.net/paylist.php?acc=' . $wallet . '&json=1');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);
			$payout_raw = json_decode($response);
			if (!$payout_raw) return -1;
			$acc_payout = $payout_raw->pending;
			if (!$acc_payout) return -1;
			$claims = $acc_payout[0]->{'pending'}; 
			return $claims;
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


?>