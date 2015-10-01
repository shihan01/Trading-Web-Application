<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');
$_SESSION['text'] = rand(1000,9999);
 if (isset($_POST['submit'])){
 	$id = $SESSION['user_id'];
 	$error = array();

 	if(isset($_POST['password1'])&&isset($_POST['password2'])){
 		$password1 = mysql_real_escape_string($_POST['password1']);
 		$password2 = mysql_real_escape_string($_POST['password2']);
 	  if($password1 = $password2){
 	  	    ;
 	  }else{
 	  	$error[] = 'Passwords you entered are not the same.';
 	  }

 	}else{
 		$error[] = 'Please enter the password.';
 	}

 	if(empty($error)){
 		$query = "UPDATE `users` SET `password` = '$password1' WHERE `user_id` = '$id' ";
 	}else{
      $error_message = "<span class = 'error'>";
      foreach($error as $key => $values){
          $error_message.="$values";
          header('Location: prompt.php?x=2');
         }
      $error_message.= "</span></br></br>";

 	}
 }


?>

<!doctype html>
<html lang = 'en'>
<head>
	<title>Register</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	<link rel = 'stylesheet' href = 'css/register.css'>
  <link rel = 'stylesheet' href = 'css/account.css'>
</head>

<body>
	<div id = 'wrapper'>
	<?php headerAndSearchCode();?>
	<?php right_bar();?>	
		
		<section id = 'right_side'>
          <form id = "generalform" class = "container" method ="POST" action = "#">
          <h3>Change Password</h3>
          <?php if (isset($error_message)){echo $error_message;} ?>
      
          <div class = "field">
          <label for ="password"> New Password: </label>
          <input type = "password" class = "input" id = "password1" name = "password1" maxlength = "80" />
          </div>
          <div class = "field">
           <label for ="password"> New Password: </label>
           <input type = "password" class = "input" id = "password2" name = "password2" maxlength = "80"/>
            <p class = "hint">20 characters maximum </p>
          </div>
         <div class = "field">
            <label for = "Confirmation"> Confirmation:</br></label>
            </br></br><input type = "text" class = "input" id = "confirmation" name = "confirmation" />
            <img id = "confirimg" src = "tester.php">
          </div>
             <input type = "submit" name = "submit" id = "submit" class = "button" value = "Submit">
          </form>
		</section>
		<?php footerCode(); ?>

	</div>
</body>

</html>