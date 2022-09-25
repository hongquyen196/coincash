<?php
            $connecDB = mysqli_connect("localhost", "coincas1_user", "TWXt3LQX3l2~", "coincas1_database");
                                
            if (!$connecDB) {
                                
                die("Connect error: " . mysqli_connect_error());
                                
            } 
            else {
                if($_GET['status']=='1')
                    $status = "Da thanh toan";
                else
                    $status= "Chờ duyệt";
                if($_GET['type']=='1')
                    $type = "card";
                else if($_GET['type']=='2')
                    $type = "bank";
                else if ($_GET['type']=='3')
                    $type = "365";
                else $type = "0";
                if($type != "0")
                    $select_pm=mysqli_query($connecDB, "SELECT p_id, name,amount,type,request_content FROM `payments` join users on payments.fb_id=users.fb_id where status='".$status."' and type='".$type."'");  
                else
                    $select_pm=mysqli_query($connecDB, "SELECT p_id, name,amount,type,request_content FROM `payments` join users on payments.fb_id=users.fb_id where status='".$status."'");  
    
                if(! $select_pm ) 
                {
                    die('select error: ' . mysql_error());
            	} 
             	$i=0;
            while($row = mysqli_fetch_assoc($select_pm)) {
            print json_encode($row);
          
        }
        
       mysqli_close($connecDB);
    }    
?>        