<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

if (isset($_POST['submit'])){
	$error=array();

	//receiver
	if(!empty($_POST['receiver'])){
		$receiver = $_POST['receiver'];
	}else{
		$error[] = 'Please enter the receiver. ';
	}

    //subject
	if(!empty($_POST['subject'])){
		$subject = $_POST['subject'];
	}else{
		$error[] = 'Please enter the subject for your message. ';
	}

	//category
    if(!empty($_POST['body'])){
		$body = $_POST['body'];
	}else{
		$error[] = 'Please enter the body for your message. ';
	}

    

	if(empty($error)){
       
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `messages` VALUES('','$receiver', '$user_id', '$subject' ,'$body', '', 'n')";
        if($su = mysql_query($query)){
            
        }else{echo mysql_error();}


	}else{
	  $error_message = "<span class = 'error'>";
      foreach($error as $key => $values){
             $error_message.="$values";
      }
      $error_message.= "</span></br></br>";

	}

}






?>

<!doctype html>
<html lang = 'en'>
<head>
	<title>Main Page</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	<link rel = 'stylesheet' href = 'css/account.css'>

</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
	   <?php right_bar();?>
		
		<section id = 'right_side'>
         
         <form id = "generalform" class = "container" method ="POST" action = "#" enctype = "multipart/form-data">
          <h3>New Message</h3>
          <?php if (isset($error_message)){echo $error_message;} ?>
          <div class = "field">
          <label for = "title">Receiver Name: </label>
          <input type = "text" class = "input" id = "title" name = "receiver" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>
         

          <div class = "field">
          <label for = "subtitle">Subject: </label>
          <input type = "text" class = "input" id = "subtitle" name = "subject" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>         
          

          <div class = "field">
          <label for = "description">Body: </label>
          <textarea type = "text" class = "input" id = "description" name = "body" maxlength = "2000" ></textarea>
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>

        


          <input type = "submit" name = "submit" id = "submit" class = "button" value = " Sent ">
          </form>
          
		</section>
		<?php footerCode(); ?>

	</div>
</body>
</html>
