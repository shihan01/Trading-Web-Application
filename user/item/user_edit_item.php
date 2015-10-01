<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

$item_number = $_GET['id'];
$i=0;

if (isset($_POST['submit'])){
	$error=array();

	//title
	if(!empty($_POST['title'])){
		$title = $_POST['title'];
		$query = "UPDATE `items_available` SET `title` = '$title' WHERE `item_number` = '$item_number'";
		if(mysql_query($query)){
			$i=1;
		}
	}else{
		$i=0;
	}

	//subtitle
	if(!empty($_POST['subtitle'])){
		$subtitle = $_POST['subtitle'];
		$query = "UPDATE `items_available` SET `subtitle` = '$subtitle' WHERE `item_number` = '$item_number'";
		if(mysql_query($query)){
			$i=1;
		}
	}else{
		$i=0;
	}

	//description
	if(!empty($_POST['description'])){
		$description = $_POST['description'];
		$query = "UPDATE `items_available` SET `description` = '$description' WHERE `item_number` = '$item_number'";
		if(mysql_query($query)){
			$i=1;
		}
	}else{
		$i=0;
	}



    //item wanted
	if(!empty($_POST['itemwanted'])){
		$itemwanted = $_POST['itemwanted'];
		$query = "UPDATE `items_available` SET `item_wanted` = '$itemwanted' WHERE `item_number` = '$item_number'";
		if(mysql_query($query)){
			$i=1;
		}
	}else{
		$i=0;
	}

	//category
    if(!empty($_POST['add_category'])){
		$category = $_POST['add_category'];
		$query = "UPDATE `items_available` SET `category` = '$category' WHERE `item_number` = '$item_number'";
		if(mysql_query($query)){
			$i=1;
		}
	}else{
		$i = 0;
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
       $query1 = "UPDATE `items_available` SET `$image_path1` = '$address1' WHERE `item_number` = '$item_number'";
       $query2 = "UPDATE `items_available` SET `$image_path2` = '$address2' WHERE `item_number` = '$item_number'";
       
        if($su1 = mysql_query($query1)&&$su2 = mysql_query($query2)){
            $i=1;
        }else{echo mysql_error();}


	}else{
	  $error_message = "<span class = 'error'>";
      foreach($error as $key => $values){
             $error_message.="$values";
      }
      $error_message.= "</span></br></br>";

	}

	if(i==1){
		header('Location: prompt.php?x=10');
	}else{
		header('Location: prompt.php?x=11');
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
		<aside id = 'left_side'> 

		<ul id ='generalform1' >
			Account Info
			<li id = 'single'>Profile</li>
			<li id = 'single'>Change Password</li>
		</ul>
		<ul id ='generalform1' >
			Items
			<li id = 'single'>Active</li>
			<li id = 'single'>Pending</li>
			<li id = 'single'>Add Item</li>
		</ul>
	    <ul id ='generalform1'>
	    	Trades
	    	<li id = 'single'>Offers Received</li>
	    	<li id = 'single'>Offers Made</li>
	    	<li id = 'single'>Offers Declined</li>
	    	<li id = 'single'>Completed Trades<li>
	    </ul>

	    <ul id ='generalform1'>
	    	Messages
	    	<li id = 'single'>Inbox</li>
	    	<li id = 'single'>Sent</li>
	    	<li id = 'single'>Compose</li>
	    	<li id = 'single'>Trash</li>

	    </ul>
		</aside>
		
		<section id = 'right_side'>
         
         <form id = "generalform" class = "container" method ="POST" action = "#" enctype = "multipart/form-data">
          <h3>Edit Item</h3>
          <?php if (isset($error_message)){echo $error_message;} ?>
          <div class = "field">
          <label for = "title"> Title: </label>
          <input type = "text" class = "input" id = "title" name = "title" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>
         

          <div class = "field">
          <label for = "subtitle"> subtitle: </label>
          <input type = "text" class = "input" id = "subtitle" name = "subtitle" maxlength = "20" />
          <p class = "hint">20 characters maximum (letters and numbers only)</p>
          </div>         
          

          <div class = "field">
          <label for = "description"> Description: </label>
          <textarea type = "text" class = "input" id = "description" name = "description" maxlength = "2000"> </textarea>
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>

          <div class = "field">
          <label for = "itemwanted"> Item Wanted: </label>
          <input type = "text" class = "input" id = "title" name = "itemwanted" maxlength = "20" />
          <p class = "hint">200 characters maximum (letters and numbers only)</p>
          </div>

          <div class = "field">
          <label1 for = 'upload1'> <p id = 'other'> Upload picture1: <input type = "file" name='file1'></p> </label1>
          </div>
          
          <div class = "field">
          <label1 for = 'upload2'> <p id = 'other'> Upload picture1: <input type = "file" name='file2'></p> </label1>
          </div>

          <div class = "field">
          <label1 for = "category"> <p id = 'other'>Category:  <?php add_category();?> </p></label1>
          </div>

          <input type = "submit" name = "submit" id = "submit" class = "button" value = " Submit ">
          </form>
          
		</section>
		<?php footerCode(); ?>

	</div>
</body>
</html>
