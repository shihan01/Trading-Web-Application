<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

 $i = 0;
 if(isset($_GET['id1'])&&isset($_GET['id2']){
 	$offerers_item = $_GET['id1'];
 	$receivers_item = $_GET['id2'];
 	if(!empty($offerers_item)&&!empty($receivers_item)){
 
 		$query2 = "DELETE FROM `offers_open` WHERE `offerers_item` = '$offerers_item' AND `receivers_item` = 'receivers_item'";
     
 		if(&$delete2 = mysql_query($query2)){
 			$i = 1;
 			header('Location: prompt.php?x=5');
 			
 		}else{echo mysql_error();}
 	}
 }

 if ($i==0){
 	header('Location: prompt.php?x=12');
 	
 }
?>