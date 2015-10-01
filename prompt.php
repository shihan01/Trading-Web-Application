<?php
session_start();
include ("includes/connect.php");
include ("includes/html_code.php");
$x = $_GET['x'];

function createMessage($x){
	if(is_numeric($x)){
		switch ($x) {
			case 0:
				$message = "Your account is now active. You may now <a href = \"login.php\"Log In!</a>";
				break;
			case 1:
			    $message = "Thank you for registering! A confirmation email has been sent to your email address. 
			                Please click on the activation link to activate your account.";
			    break;
			case 2:
			    $message = "That email or username has already been registered.";  
			    break;
			case 3:
			    $message = "Sorry, but that item has already been traded!";
			    break;
			case 4:
			    $message = "Item successfully updated!";
			    break;
			case 5:
			    $message = "Item successfully deleted!";
			    break;
			case 6:
			    $message = "Message has been sent!";
			    break;
			case 7:
			    $message = "Thanke you for leaving a feedback";
			    break;
			case 8:  
			    $message = "Item added successfully!";
			    break;
			case 9:
			    $message = "That is not your item!";
			    break;  
			case 10:
			    $message = "You item has beeb successfully edited!";
			    break;         
			case 11:
			    $message = "You didn't edit your item!";
			    break;   
			case 12:
			    $message = "Sorry, your item didn't delete successfully!";
			    break;  
			case 13:
			    $message = "You successfully accept this offer!";
			    break; 
			case 14:
			    $message = "Sorry you cannot accept this offer!";
			    break;   
		}
		    echo $message;
	}
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Prompt</title>
	<link rel = "stylesheet" href = "css/main.css">
	<link rel = "stylesheet" href = "css/prompt.css">
</head>

<body>
	<div id = "wrapper">
	<?php headerAndSearchCode(); ?>
	 <div id = "outer">
	 	<div id = "inner">
	 	   <?php createMessage($x);?>
	 	</div>
	 </div>
	<?php footerCode(); ?>
    </div>
</body>
</html>