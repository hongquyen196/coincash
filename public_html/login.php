<?php  	
    $website = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"; 
	session_start();
	if (!empty($_SESSION["wallet"]) && !empty($_SESSION["fb_id"]) && !empty($_SESSION["time"]) && !empty($_SESSION["total"]) && !empty($_SESSION['id']))
		header("Location: work.php");
    $app_id = "178854842643402";
    $app_secret = "0bbeb56981500233356a698490ba0c2b";
    $redirect_uri = urlencode($website . "login.php");
    if (isset($_GET["code"])){	
        $code = $_GET["code"];
		$ch = curl_init(); 
      	curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.9/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch); 
        curl_close($ch);
        // Get access token
        $aResponse = json_decode($response);
        $access_token = $aResponse->access_token;
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.9/me?&access_token=$access_token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch); 
        curl_close($ch);
        $user = json_decode($response);
        // Log user in
       
		$fb_id = $user->id;
		$name = $user->name;
		$gettime = date("Y-m-d H:i:s");
		echo "Time: $gettime<br>";
   		$_SESSION['fb_id'] = $fb_id;
   		$_SESSION['name'] = $name;
   		$_SESSION['time'] = $gettime;
   	
        // Connection Database
        $connecDB = mysqli_connect("localhost", "admin", "489d088b55828582e", "coincash");
        if (!$connecDB) {
        	die("Connect error: " . mysqli_connect_error());
        } else {
	        $select_id = mysqli_query($connecDB, "SELECT count(*) FROM users WHERE fb_id = '$fb_id'");
	        $id_exist = mysqli_fetch_row($select_id);    
        	if(!$id_exist[0]) //nếu không tồn tại tài khoản
	        {	
	        
	          
	        	
	        	$count_id = mysqli_query($connecDB, "SELECT count(*) FROM users");
	    			$user_id = mysqli_fetch_row($count_id)[0] + 1; 
	    		//$get_wallet = mysqli_query($connecDB, "SELECT wallet FROM wallets WHERE id = $user_id");
	    		//	$user_wallet =  trim(mysqli_fetch_row($get_wallet)[0]);
	        	$user_wallet = '';
	        	mysqli_query($connecDB, "INSERT INTO users VALUES ($user_id, '$name', '$fb_id', '$user_wallet', '$gettime', '1142889275815948', 0)");
	        	//mysqli_query($connecDB, "INSERT INTO usercoins(id, wallet) VALUES ($user_id, '$user_wallet')");
	        		$user_total = 0;
	        	mysqli_close($connecDB);
	       		header("Location: /");
	        
	   		}
	   		else {
	   			mysqli_query($connecDB, "UPDATE users SET name = '$name', last_login = '$gettime' WHERE fb_id = '$fb_id'");
	   			$select_users = mysqli_query($connecDB, "SELECT * FROM users WHERE fb_id = '$fb_id'");
	   			$row = mysqli_fetch_assoc($select_users);
	   			$user_id = $row['id'];
	   			$user_wallet = $row['wallet'];
	   			$select_usercoins = mysqli_query($connecDB, "SELECT total FROM usercoins WHERE wallet = '$user_wallet'");
				$user_total = mysqli_fetch_row($select_usercoins)[0];		
	   		}
	   		if(!$user_wallet) die("Working code: NULL<br>Please contact us for a working code");
	   		$_SESSION['id'] = $user_id;
	   		$_SESSION['wallet'] = $user_wallet;
    		$_SESSION['total'] = $user_total;
	        mysqli_close($connecDB);
	        header("Location: /work.php");
        }    
     
    } else {
    	header("Location: /");
    }
?>