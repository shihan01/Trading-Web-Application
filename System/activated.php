<?php
include("includes/connect.php");
 if(isset($_GET['email'])&&filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
 	$email = mysql_real_escape_string($_GET['email']);
 }

 if(isset($_GET['key']) && (strlen($_GET['key'])==32)){
 	$key = mysql_real_escape_string($_GET['key']);

 }

 if(isset($email) && isset($key)){
 	$result = mysql_query("SELECT * FROM tempusers WHERE email ='$email' AND activation = '$key' LIMIT 1") 
 	or die(mysql_error());
 	while($row = mysql_fetch_array($result)){
 		$user_id = mysql_real_escape_string($row['user_id']);
 		$user_name = mysql_real_escape_string($row['username']);
 		$email = mysql_real_escape_string($row['email']);
 		$password = mysql_real_escape_string($row['password']);

 	}

 	$result1 = mysql_query("INSERT INTO users (user_id, username, email, password, role,credits) 
 		       VALUES('', '$user_name', '$email', '$password', 'user', 0)")or die(mysql_error());
 	$result2 = mysql_query("DELETE FROM tempusers WHERE user_id = '$user_id'")or die(mysql_error());
    
    if(!$result1){
    	echo 'Oops! Your account could not be activated.';
    }else{
    	header('Location: prompt.php?x=0');
    }
 }

?>