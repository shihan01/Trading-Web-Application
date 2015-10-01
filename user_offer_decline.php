<?php
if(isset($id)){
	$id = $_GET['id'];
    if(!empty($id)){
    	$query = "SELECT * FROM `offers_open` WHERE `offerers_item` = '$id'";
    	$query_run = mysql_query($query);
    	while ($result = mysql_fetch_assoc($query_run)){
              $trade_id = $result['trade_id'];
              $offerers_id = $result['offerers_id'];
              $offerers_item = $result['offerers_item'];
              $receivers_id = $result['receivers_id'];
              $receivers_items = $result['receivers_items'];
              $date_offered = $result['date_offered'];
              $date_expired = $result['date_expired'];
    	}
    	$query = "INSERT INTO `offers_declined` VALUES('$trade_id', '$offerers_id','$offerers_item','$receivers_id',
    		                                           '$receivers_items','$date_offered','$date_expired','')";
      $query2 = "DELETE  FROM `offers_open` WHERE `offerers_item` = '$id'";
       
      if($query_run1 = mysql_query($query1)&&$query_run2 = mysql_query($query2)){
        header('Location:prompt.php?x=13');
      }else{
        header('Location:prompt.php?x=14');
      }

    }
}
?>