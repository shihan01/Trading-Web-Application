<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');


if(isset($_POST['submit'])){
	$error = array();

	//username 
	if(empty($_POST['username'])){
		$error[] = 'Pleade enetr a username.';
	}else if(ctype_alnum($_POST['username'])){
		$username = $_POST['username'];

	}else{
		$error[] = 'Username must consist of letters and numbers. ';
	}
  

	// email
	if(empty($_POST['email'])){
		$error[] = 'Please eneter your email. ';
	}else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$email = mysql_real_escape_string($_POST['email']);
	}else{
		$error[] = 'Your e-mail address is invalid. ';
	}

	if (empty($_POST['password'])){
		$error[] = 'Please enter your password.';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}

  if(empty($_POST['confirmation'])){
    $error[] = 'Please eneter the confirmation number';
  }else if($_POST['confirmation']!=$_SESSION['text'] ){
    $_SESSION['text'] = rand(1000,9999);
    echo $_POST['confirmation'];
    echo $_SESSION['text'];
    $error[] = 'The confirmation is not correct!';
  }else{;}



	if(empty($error)){
         $result = mysql_query("SELECT * FROM users WHERE email = '$email'")or die(mysql_error());
           if (mysql_num_rows($result)==0){
           	      $activation = md5(uniqid(rand(), true));
           	      $result2 = mysql_query(" INSERT INTO `tempusers`VALUES('', '$username','$email', '$password', '$activation')")or die(mysql_error());
                  if(!$result2){
                  	die('Could not insert into database: '.mysql_error());
                  }else{
                  	 $message = " To activate your account, please click on this link: \n\n";
                     $message .="http: shihanshen.com".'/activated.php?email='.urlencode($email)."&key=$activation";
                     mail($email, 'Registration Comfirmation', $message);
                     header('Location: prompt.php?x=1');
                  }
           }else{
           	header('Location: prompt.php?x=2');
           }
	}else{
      $error_message = "<span class = 'error'>";
      foreach($error as $key => $values){
          $error_message.="$values";
      }
      $error_message.= "</span></br></br>";

	}

}else{
  $_SESSION['text'] = rand(1000,9999);
}

?>

<!doctype html>
<html lang = 'en'>
<head>
	<title>Register</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	<link rel = 'stylesheet' href = 'css/register.css'>
</head>

<body>
	<div id = 'wrapper'>
	<?php headerAndSearchCode();?>
		<aside id = 'left_side'> <img id = 'img1'src = "images/03.jpg">
		</aside>
		
		<section id = 'right_side'>
          <form id = "generalform" class = "container" method ="POST" action = "#">
          <h3>Register</h3>
          <?php if (isset($error_message)){echo $error_message;} ?>
          <div class = "field">
          <label for = "username"> Username: </label>
          <input type = "text" class = "input" id = "username" name = "username" maxlength = "20" />
          <p class = "hint" id = 'hint1'>20 characters maximum (letters and numbers only)</p>

          </div>
          <div class = "field">
          <label for ="email"> Email: </label>
          <input type = "text" class = "input" id = "email" name = "email" maxlength = "80" />
          <p class = "hint" id ='hint2'>Please user your own email </p>
          </div>
          <div class = "field">
           <label for ="password"> Password: </label>
           <input type = "password" class = "input" id = "password" name = "password" maxlength = "80" />
            <p class = "hint" id='hint3'>20 characters maximum </p>
          </div>
         <div class = "field">
            <label for = "Confirmation"> Confirmation:</br></label>
            </br></br><input type = "text" class = "input" id = "confirmation" name = "confirmation" />
            <img id = "confirimg" src = "confirm_img.php">
            <p class = "hint" id='hint4'>Please type in the number on the right </p>
          </div>
             <input type = "submit" name = "submit" id = "submit" class = "button" value = " Submit ">
          </form>
		</section>
		<?php footerCode(); ?>

	</div>
  
  <script type = 'text/javascript' src = 'jquery.js'></script>
  <script type="text/javascript" src = 'register.js'></script>

</body>

</html>