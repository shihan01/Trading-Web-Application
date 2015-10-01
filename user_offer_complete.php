<?php
if(isset($id)){
  $offerers_item = $_GET['id1'];
	$receivers_item = $_GET['id2'];
    if(!empty($id)){
    	$query = "SELECT * FROM `offers_accepted` WHERE `offerers_item` = '$offerers_item' AND '$receivers_item' = '$receivers_item'";
    	$query_run = mysql_query($query);
    	while ($result = mysql_fetch_assoc($query_run)){
              $offerers_id = $result['offerers_id'];
              $offerers_item = $result['offerers_item'];
              $receivers_id = $result['receivers_id'];
              $receivers_item = $result['receivers_item'];
             
    	}
      $query = "SELECT * FROM `items_available` WHERE `item_number` = '$offerers_item'";
      $query_run = mysql_query($query);
      while($result = mysql_fetch_assoc($query_run)){
        $item_number = $result['item_number'];
        $owner_id = $result['owner_id'];
        $date_listed = $result['date_listed'];
        $date_ending = $result['date_ending'];
        $title = $result['title'];
        $subtitle = $result['subtitle'];
        $description = $result['description'];
        $category = $result['category'];
        $image_path1 = $result['image_path1'];
        $image_path2 = $result['image_path2'];
        $image_path3 = $result['image_path3'];
        $image_path4 = $result['image_path4'];
        $image_path5 = $result['image_path5'];
        $item_location = $result['item_location'];
        $item_wanted = $result['item_wanted'];
        $status = $result['status'];
      }
      $query = "SELECT * FROM `items_available` WHERE `item_number` = '$receivers_item'";
      $query_run = mysql_query($query);
      while($result = mysql_fetch_assoc($query_run)){
        $item_number_r = $result['item_number'];
        $owner_id_r = $result['owner_id'];
        $date_listed_r = $result['date_listed'];
        $date_ending_r = $result['date_ending'];
        $title_r = $result['title'];
        $subtitle_r = $result['subtitle'];
        $description_r = $result['description'];
        $category_r = $result['category'];
        $image_path1_r = $result['image_path1'];
        $image_path2_r = $result['image_path2'];
        $image_path3_r = $result['image_path3'];
        $image_path4_r = $result['image_path4'];
        $image_path5_r = $result['image_path5'];
        $item_location_r = $result['item_location'];
        $item_wanted_r = $result['item_wanted'];
        $status = $result['status'];
      }
    	$query1 = "INSERT INTO `items_traded` VALUES('$item_number', '$owner_id','$date_listed','$date_ending',
    		                                           '$title','$subtitle','$description','category','$image_path1',
                                                   '$image_path2', '$image_path3', '$image_path4', '$image_path5',
                                                    '$title_r','')";
      $query1 = "INSERT INTO `items_traded` VALUES('$item_number_r', '$owner_id_r','$date_listed_r','$date_ending_r',
                                                   '$title_r','$subtitle_r','$description_r','category_r','$image_path1_r',
                                                   '$image_path2_r', '$image_path3_r', '$image_path4_r', '$image_path5_r',
                                                    '$title','')";
      $query2 = "DELETE  FROM `offers_accepted` WHERE `offerers_item` = '$id'";
       
      if($query_run1 = mysql_query($query1)&&$query_run2 = mysql_query($query2)){
        header('Location:prompt.php?x=13');
      }else{
        header('Location:prompt.php?x=14');
      }

    }
}
?>