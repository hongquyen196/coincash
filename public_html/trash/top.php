 <!DOCTYPE html>
 <html lang="vi">
 <head>
 	<title></title>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    
    </style>
    <link href="https://raiblockscommunity.net/assets/main.css?v=1.73" rel="stylesheet" type="text/css">

 </head>
 <body>
     <table>
 <?php
 
 		$connecDB = mysqli_connect("localhost", "coincas1_user", "TWXt3LQX3l2~", "coincas1_database");

        if (!$connecDB) {

        	die("Connect error: " . mysqli_connect_error());

        } else {
	       	$select_top = mysqli_query($connecDB, "SELECT users.name, users.fb_id, usercoins.total, usercoins.money from usercoins join users on usercoins.wallet=users.wallet WHERE usercoins.total > 0 ORDER BY usercoins.total DESC LIMIT 0, 20 ");
	       	if(! $select_top ) {
			   die('select error: ' . mysql_error());
			} 
	       	$i=0;
	       	echo ('<tr><td class="numberc">Vị thứ</td><td class="numberc">Tên facebook</td><td class="numberc">Id facebook</td><td class="numberc">Tổng coin</td><td class="numberc">Tổng tiền (vnd)</td></tr>');
			while($row = mysqli_fetch_assoc($select_top)) {
			    $i++;
		      echo ('<tr><td class="numberc">'.$i.'</td><td class="numberc">'.$row['name'] . '</td><td class="numberc">' . $row['fb_id'] . '</td><td class="numberc">' . $row['total']  . '</td><td class="numberc">'.$row['money'].'</td></tr>');
		    }
	        mysqli_close($connecDB);
        }    
?>
    </table>
 </body>
 </html>
