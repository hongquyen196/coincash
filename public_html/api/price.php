<?php 

	$a = coinmarketcap(); //get price mrai
	$b = remitano()-1000000; // get price btc
	$c = round(raiblockscommunity()/1000000, 6); //get rate pay mrai
	echo "XRB to BTC: $a";
	echo "<br>";
	echo "BTC to VND: $b";
	echo "<br>";
	echo "Claim to XRB: $c";
	echo "<br><br>";
	$d = ($c * $a * $b);

	echo "Claim to VND: " .  round($d * 0.65) . " ($d)";
	echo "<br>";
	$e = ($a * $b);
	echo "XRB to VND: " . round($e * 0.65) . " ($e)";
	echo "<br>";

	$price = round($d * 0.65); 
	$connecDB = mysqli_connect("45.76.50.78", "root", "489d088b55828582e", "coincash");
	if (!$connecDB) {
		die("Connect error: " . mysqli_connect_error());
	} else {
		$slrate = mysqli_query($connecDB, "SELECT rate FROM info");
		$rate = mysqli_fetch_row($slrate)[0];
		if ($price == $rate) die("Don't need update!");
		if(mysqli_query($connecDB, "UPDATE info SET rate = '$price'")){
			echo "Updated price!";
		}
	}
	mysqli_close($connecDB);

	function raiblockscommunity() {
		$price = 0; $temp = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://faucet.raiblockscommunity.net/history.php?limit=10&json=1');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);

			$json = json_decode($response);
			$distributions = $json->distributions;
			foreach ($distributions as $value) {
				$temp += $value->{'reward'};
			}
			$reward = $temp/10;
			if(!$reward) die ("Error get price form Raiblockscommunity!");
			$price = $reward;
		} catch (Exception $e) {
			return 0;
		}
		return $price;
	}


	function coinmarketcap() {
		$price = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/raiblocks/');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);

			$json = json_decode(rtrim(ltrim($response, "["), "]"));
			$price_btc = $json->price_btc;
			if(!$price_btc) die ("Error get price form Coinmarketcap!");
			$price = $price_btc;
		} catch (Exception $e) {
			return 0;
		}
		return $price;
	}

	
	function remitano() {
		$price = 0; $temp = 0; $count = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://remitano.com/api/v1/offers/best');
			curl_setopt($ch, CURLOPT_POST, 1);
			$arrayName = array('country_code' => 'vn', 'offer_type' => 'buy', 'coin_amount' => 0.1);
			$jsondata = json_encode($arrayName);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondata);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Content-Length: ' . strlen($jsondata))
			);
			$response = curl_exec($ch); 
			curl_close ($ch);
			$response = '{"array":' . $response . '}';
			$json = json_decode($response);
			$array = $json->array;
			foreach ($array as $value) {
				$mcp = $value->{'max_coin_price'};
				if($count == 4) break;
				if($mcp) {
					$temp += $mcp;
					$count += 1;
				}

			}
			$max_coin_price = $temp/$count;
			if(!$max_coin_price) die ("Error get price form Remitano!");
			$price = $max_coin_price;
		} catch (Exception $e) {
			return 0;
		}
		return $price;
	}

	function remitano2() {
		$price = 0;
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://remitano.com/api/v1/offers?country_code=vn&offer_type=buy');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($ch); 
			curl_close ($ch);

			$json = json_decode($response);
			$array = $json->offers;
			foreach ($array as $value) {
				$max_coin_price = $value->{'max_coin_price'};
				if($max_coin_price) break;
			}
			if(!$max_coin_price) die ("Error get price form Remitano!");
			$price = $max_coin_price;
		} catch (Exception $e) {
			return 0;
		}
		return $price;
	}
 ?>