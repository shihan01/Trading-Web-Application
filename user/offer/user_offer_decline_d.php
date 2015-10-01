<?php
if(isset($id)){
	$offerers_item = $_GET['id1'];
  $receivers_item = $_GET['id2']
    if(!empty($id)){
    	$query = "SELECT * FROM `offers_open` WHERE `offerers_item` = '$id1' AND `receivers_item` = '$id2'";
    	$query_run = mysql_query($query);
    	while ($result = mysql_fetch_assoc($query_run)){
              $trade_id = $result['trade_id'];
              $offerers_id = $result['offerers_id'];
              $offerers_item = $result['offerers_item'];
              $receivers_id = $result['receivers_id'];
              $receivers_item = $result['receivers_item'];
              $date_offered = $result['date_offered'];
              $date_expired = $result['date_expired'];
    	}
    	$query1 = "INSERT INTO `offers_accepted` VALUES('$trade_id', '$offerers_id','$offerers_item','$receivers_id',
    		                                           '$receivers_item','$date_offered','$date_expired','','')";
      $query2 = "DELETE  FROM `offers_open` WHERE `offerers_item` = '$offerers_item'";
      $query3 = "DELETE FROM `offers_open` WHERE `receivers_item` = '$receivers_item'";
      
      if($query_run1 = mysql_query($query1)&&$query_run2 = mysql_query($query2)&&$query_run3 = mysql_query($query3)){
        header('Location:prompt.php?x=13');
      }else{
        header('Location:prompt.php?x=14');
      }

    }
}
?>