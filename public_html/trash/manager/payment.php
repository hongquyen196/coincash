<?php
            $connecDB = mysqli_connect("localhost", "coincas1_user", "TWXt3LQX3l2~", "coincas1_database");
                                
            if (!$connecDB) {
                                
                die("Connect error: " . mysqli_connect_error());
                                
            } 
            else {
                $id=$_GET['id'];
                $status=$_GET['status'];
                $payment_content=$_GET['payment_content'];
                $amount=$_GET['amount'];
                $date=date("Y-m-d H:i:s");
                if($status=="0")
                {
                    $u_id= mysqli_fetch_array(mysqli_query($connecDB, "SELECT u_id FROM `payments` where p_id=".$id));
                    mysqli_query($connecDB, "UPDATE `payments` SET `payment_date` = '".$date."', `status` = 'Từ chối', `payment_content` = 'Số tiền được hoàn trả do thông tin bạn cung cấp không đúng hoặc không đủ điều kiện rút tiền' WHERE `payments`.`p_id` = ".$id); 
                    mysqli_query($connecDB, "UPDATE `usercoins` SET `available` =`available` + ".$amount.", `available` =`available` - ".$amount." WHERE `usercoins`.`id` =".$u_id[0]); 
                }
                else if($status=="1")
                {
                    mysqli_query($connecDB, "UPDATE `payments` SET `payment_date` = '".$date."', `status` = 'Đã thanh toán', `payment_content` = '".$payment_content."' WHERE `payments`.`p_id` = ".$id); 
                    /*$u_id= mysqli_fetch_array(mysqli_query($connecDB, "SELECT u_id FROM `payments` where p_id=".$id));
                    $amount=$_GET['amount'];
                    $pm= mysqli_fetch_array(mysqli_query($connecDB, "SELECT payment FROM `usercoins` where id=".$u_id[0]));
                    $payment=$pm[0]-$amount;
                    $p= mysqli_fetch_array(mysqli_query($connecDB, "SELECT paid FROM `usercoins` where id=".$u_id[0]));
                    $paid =$p+$amount;
                    $sql= "UPDATE `usercoins` SET `paid` =".$paid.", `payment`=".$payment." WHERE `usercoins`.`id` =".$u_id[0];
                    mysqli_query($connecDB, $sql);*/ 
                }
            
                 
        
       mysqli_close($connecDB);
    }    
?>        