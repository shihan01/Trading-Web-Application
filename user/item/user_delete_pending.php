<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

 $i = 0;
 if(isset($_GET['id'])){
 	$item_number = $_GET['id'];
 	if(!empty($item_number)){
 		$query1 = "DELETE FROM `items_available` WHERE `item_number` = '$item_number'";
     
 		if($delete1 = mysql_query($query1)){
 			$i = 1;
 			header('Location: prompt.php?x=5');
 			
 		}else{echo mysql_error();}
 	}
 }

 if ($i==0){
 	header('Location: prompt.php?x=12');
 	
 }
?>