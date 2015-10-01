<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

if (isset($_POST['submit'])){
	$error=array();

	//title
	if(!empty($_POST['title'])){
		$title = $_POST['title'];
	}else{
		$error[] = 'Please enter a title for your item. ';
	}

    //title wanted
	if(!empty($_POST['itemwanted'])){
		$itemwanted = $_POST['title'];
	}else{
		$error[] = 'Please enter the item  you want to exchange for. ';
	}

	//category
    if(!empty($_POST['add_category'])){
		$add_category = $_POST['add_category'];
	}else{
		$error[] = 'Please enter the category for your item. ';
	}

    //images
  


    $file= $_FILES['file1'];
	$name=$file['name'];
	if(!empty($name)){
 		$size=$file['size'];
 		$max_size=2097152;
 		echo $extension = substr($name,strpos($name, '.')+1);
 		$tmp_name=$file['tmp_name'];
 		if(($extension=='jpg'||$extension=='jpeg')){
 		   $location = 'test/';
 		   if($size<=$max_size){
 		   if (move_uploaded_file($tmp_name, $location.$name)){
 			 echo $address1 = $location.$name;
 			 echo 'fuckkkkkkk';
 		    }

 		  }else{
 		  	$error[] = 'Your file is too big.';
 		   }  
          }else {
         	$error[] = 'The file must be jpg or jpeg.';
         	           echo '12344';
 	      }
	  }else{
		$address1 = 'None';
	}

    $file= $_FILES['file2'];
	$name=$file['name']; 
	if(!empty($name)){
 		$size=$file['size'];
 		$max_size=2097152;
 		$extension = substr($name,strpos($name, '.')+1);
 		$tmp_name=$file['tmp_name'];
 		if(($extension=='jpg'||$extension=='jpeg')){
 		   $location = 'test/';
 		   if($size<=$max_size){
 		   if (move_uploaded_file($tmp_name, $location.$name)){
 			 $address2 = $location.$name;
 		    }

 		  }else{
 		  	$error[] = 'Your file is too big.';
 		   }  
          }else {
         	$error[] = 'The file must be jpg or jpeg.';
         	       echo '43121';
 	      }
	  }else{
		$address2 = 'None';
	}






	if(empty($error)){
        if (empty($_POST['subtitle'])){
             $subtitle = 'None'; 
        }else{
        	$subtitle = $_POST['subtitle'];
        }

        if (empty($_POST['description'])){
             $description = 'None'; 
        }else{
        	$description = $_POST['description'];
        }
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `items_available` VALUES('','$user_id', '', '' ,'$title', '$subtitle', '$description',
        	                                            '$add_category', '$address1', '$address2', '' , '', 
        	                                            '', '', '$itemwanted', 'available')";
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
          <h3>Profile</h3>
          <?php if (isset($error_message)){echo $error_message;} ?>
          <div class = "field">
          <label for = "title"> Your Name: </label>
          <input type = "text" class = "input" id = "name" name = "title" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>
         

          <div class = "field">
          <label for = "subtitle">Your School: </label>
          <input type = "text" class = "input" id = "school" name = "subtitle" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>         
          

          <div class = "field">
          <label for = "description">Your Major: </label>
          <input type = "text" class = "input" id = "major" name = "description" maxlength = "2000" />
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>

          <div class = "field">
          <label for = "itemwanted"> Graduation of Year: </label>
          <input type = "text" class = "input" id = "year" name = "itemwanted" maxlength = "20" />
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>

           <div class = "field">
          <label for = "itemwanted"> Your Phone Number: </label>
          <input type = "text" class = "input" id = "phone" name = "itemwanted" maxlength = "20" />
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>
          
         

          <input type = "submit" name = "submit" id = "submit" class = "button" value = " Submit ">
          </form>
          
		</section>
		<?php footerCode(); ?>

	</div>
</body>
</html>
