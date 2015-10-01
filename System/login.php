<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

if(isset($_SEESION['user_id'])){
  header('Location:account_itemsactive.php');
}


if(isset($_POST['submit'])){
  $error = array();

  //username 
  if(empty($_POST['username'])){
    $error[] = 'Please eneter a username. ';
  }else if(ctype_alnum($_POST['username'])){
    $username = $_POST['username'];

  }else{
    $error[] = 'Username must consist of letters and numbers. ';
  }


 //password
  if (empty($_POST['password'])){
    $error[] = 'Please enter your password. ';
  }else{
    $password = mysql_real_escape_string($_POST['password']);
  }

  //confirmatiom

   if(empty($_POST['confirmation'])){
    $error[] = 'Please eneter the confirmation number';
    $_SESSION['text'] = rand(1000,9999);
  }else if($_POST['confirmation']!=$_SESSION['text']){
    $error[] = 'The confirmation is not correct!';
    $_SESSION['text'] = rand(1000,9999);
  }else{;}

  if(empty($error)){
               $result = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'")or die(mysql_error());
               if (mysql_num_rows($result)==1){
                  while($row=mysql_fetch_array($result)){
                    $_SESSION['user_id']=$row['user_id'];
                    header('Location:account_itemsactive.php');
                  }

            }else{
                 $error[] = 'Username or password is incorrect. ';}
          
                }else{
                $error_message = '<span class = "error">';
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
	<link rel = 'stylesheet' href = 'css/login.css'>

</head>

<body>
	<div id = 'wrapper'>
	<?php headerAndSearchCode();?>
		<aside id = 'left_side'> <img src = "images/02.jpg">
		</aside>
		
		<section id = 'right_side'>
          <form id = "generalform" class = "container" method ="POST" action = "">
          <h3>Log In</h3>
          <?php if(isset($error_message)){echo $error_message;} ?>
        
          <div class = "field">
          <label for ="username"> Username: </label>
          <input type = "text" class = "input" id = "username" name = "username" maxlength = "20" />
          <p class = "hint" id = 'hint1'>20 characters maximum (letters and numbers only)</p>
          </div>

          <div class = "field">
          <label for ="email"> Email: </label>
          <input type = "text" class = "input" id = "email" name = "email" maxlength = "80" />
          </div>
          <div class = "field">
           <label for ="password"> Password: </label>
           <input type = "password" class = "input" id = "password" name = "password" maxlength = "80" />
          <p class = "hint" id = 'hint2'>20 characters maximum </p>
          </div>
             <div class = "field">
            <label for = "Confirmation"> Confirmation:</br></label>
            </br></br><input type = "text" class = "input" id = "confirmation" name = "confirmation" />
            <img id = "confirimg" src = "tester.php">
          </div>
             <input type = "submit" name = "submit" id = "submit" class = "button" value = " Submit ">
          </form>
		</section>
		<?php footerCode(); ?>

	</div>

  <script type = 'text/javascript' src = 'jquery.js'></script>
  <script type="text/javascript" src = 'login.js'></script>
</body>
</html>