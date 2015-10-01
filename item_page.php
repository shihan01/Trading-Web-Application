<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

function start(){
if(isset($_GET['id'])){
	if(!empty($_GET['id'])){
		$item_number = $_GET['id'];
		$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
	    $query_run = mysql_query($query);
	    while ($result = mysql_fetch_assoc($query_run)) {
	    	$title = $result['title'];
	    	$subtitle = $result['subtitle'];
	    	$description = $result['description'];
	    	$category = $result['category'];
	    	$owner_id = $result['owner_id'];
	    	$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$owner_id'";
	    	$query_run1 = mysql_query($query1);
	    	while($result1 = mysql_fetch_assoc($query_run1)){
	    		$username = $result1['username'];
	    	}
	    	$image1 = $result['image_path1'];
	    	$image2 = $result['image_path2'];
	    	$image3 = $result['image_path3'];
	    	$item_wanted = $result['items_wanted'];
	    }
	   }
	  }
     }

function pic(){
   if(isset($_GET['id'])){
   	 if(!empty($_GET['id'])){
   	 	$item_number = $_GET['id'];
		$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
		$query_run = mysql_query($query);
		while ($result = mysql_fetch_assoc($query_run)) {
			$image1 = $result['image_path1'];
			echo "<img src = '$image1'>";
		}
   	 }
   }
}

function basic_info(){
	 if(isset($_GET['id'])){
   	   if(!empty($_GET['id'])){
   	 	$item_number = $_GET['id'];
		$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
		$query_run = mysql_query($query);
		while ($result = mysql_fetch_assoc($query_run)) {
		        $title = $result['title'];
		    	$subtitle = $result['subtitle'];
		    	$category = $result['category'];
		    	$owner_id = $result['owner_id'];
		    	$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$owner_id'";
		    	$query_run1 = mysql_query($query1);
		    	while($result1 = mysql_fetch_assoc($query_run1)){
		    		$username = $result1['username'];
		    	}
		    	$item_wanted = $result['items_wanted'];

		}
		echo "<p><strong>$title</strong></p>";
		echo "<p id = 'sub'>$subtitle</p>";
		echo "</br></br>";
		echo "<p><span class = 'text'>Category</span>: <strong>$category</strong></p>";
		echo "<p><span class = 'text'>Owner:</span> <strong>$username</strong></P>";
		echo "<p><span class = 'text'>Owner ID:</span> <strong>$owner_id</strong></P>";
		echo "<p><span class = 'text'>Item wanted:</span> <strong>$item_wanted</strong></p>";
		echo "</br>";
		echo "<form action = '#' method = 'POST'>";
		echo "<input type = 'submit' name = 'send' value = 'Messages'>";
		echo "</form>";

   	 }
   }

}

function description(){
	if(isset($_GET['id'])){
		if(!empty($_GET['id'])){
			$item_number = $_GET['id'];
			$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
		    $query_run = mysql_query($query);
		    while ($result = mysql_fetch_assoc($query_run)) {
		    	$description = $result['description'];

            }
            echo "<span class = 'text'>Description: </span></br>$description";
		}
	}
}

function item(){
	if(isset($_GET['id'])){
		if(!empty($_GET['id'])){
			$item_number = $_GET['id'];
			$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
		    $query_run = mysql_query($query);
		    while ($result = mysql_fetch_assoc($query_run)) {
		    	$title = $result['title'];
		    	$subtitle = $result['subtitle'];
		    	$description = $result['description'];
		    	$category = $result['category'];
		    	$owner_id = $result['owner_id'];
		    	$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$owner_id'";
		    	$query_run1 = mysql_query($query1);
		    	while($result1 = mysql_fetch_assoc($query_run1)){
		    		$username = $result1['username'];
		    	}
		    	$image1 = $result['image_path1'];
		    	$image2 = $result['image_path2'];
		    	$image3 = $result['image_path3'];
		    	$item_wanted = $result['items_wanted'];
		    }
		
	       echo "<h1 id = 'search1'>Item: $title</h1>";
	       echo "<h4 id = 'search1'>Subtitle: $subtitle</h4>";
	       echo "<h1 id = 'search1'>Owner Name: $username</h1>";
	       echo "<h4 id = 'search1'>Owner ID: $owner_id</h4>";
	       echo "<table id = 'search3'><tr><td><img id = 'img1' src = '$image1'></td>";
	       echo "<td><img id = 'img1' src = '$image2'></td>";
	       echo "<td><img id = 'img1' src = '$image3'></td></tr>";
	       echo "</table>";
	       echo "<p id = 'search1'>Description: </p>";
	       echo "<p id = 'search1'>$description</p>";
	       echo "<p id = 'search1'>Exchanging: $item_wanted</p>";
	       
		}
	}
 }

function user_id(){
	if (isset($_SESSION['user_id'])){
        $item_number = $_GET['id'];
		$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
	    $query_run = mysql_query($query); 
	    while ($result = mysql_fetch_assoc($query_run)) {
	    	$owner_id = $result['owner_id'];
	    }
	     if($_SESSION['user_id']==$owner_id){
	     	return 3;
	     }else{
	     	return 2;
	     }  
	}else{ 
		return 1;
	}
}


 function selection(){
    if(isset($_GET['id'])){
	if(!empty($_GET['id'])){
		$item_number = $_GET['id'];
		$query = "SELECT * FROM `items_available` WHERE `item_number` = '$item_number'";
	    $query_run = mysql_query($query);
	    while ($result = mysql_fetch_assoc($query_run)) {
	    	$title = $result['title'];
	    	$subtitle = $result['subtitle'];
	    	$description = $result['description'];
	    	$category = $result['category'];
	    	$owner_id = $result['owner_id'];
	    	$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$owner_id'";
	    	$query_run1 = mysql_query($query1);
	    	while($result1 = mysql_fetch_assoc($query_run1)){
	    		$username = $result1['username'];
	    	}
	    	$image1 = $result['image_path1'];
	    	$image2 = $result['image_path2'];
	    	$image3 = $result['image_path3'];
	    	$item_wanted = $result['items_wanted'];
	    }
	   }
	  }

 	$id1 = $_SESSION['user_id'];
 	if(isset($owner_id)){
 	if($id1!=$owner_id){
	 	echo $query1 = "SELECT `item_number`,`title` FROM `items_available` WHERE `owner_id` = '$id1'";
	 	$query_run1 = mysql_query($query1);
	 	echo "<section id = 'sec1'>";
	 	echo 'Exchanging: ';
	 	echo "<select>";
	 	while($result1 = mysql_fetch_assoc($query_run1)){
	 		$title1 = $result1['title'];
	 		$item_number1 = $result1['item_number'];
	 		echo "<option value = '$item_number1'>";
	 		echo "$title1";
	 		echo "</option>";
	 	}
	 	echo "</select>";
	 	echo "</section>";
	 	echo "<section id = 'sec2'>";
	 	echo "<form action = '#' method = 'GET'>";
	 	echo "<input type = 'submit' value =' submit ' name = 'select' class= 'button'>";
	 	echo "</form>";
	 	echo "</section>";
	 	
    }else{
    	echo "<section id = 'sec2'>";
	 	echo "<form action = '#' method = 'GET'>";
	 	echo "<input type = 'submit' value =' Edit ' name = 'select' class= 'button'>";
	 	echo "</form>";
	 	echo "</section>";
    }
   } 
  }
 
 if(isset($_GET['select'])){
 	$query2 = "INSERT INTO `offers_open` VALUES('','$id1','$item_number1','$owner_id','$item_number','','')";
 	$query_run2 = mysql_query($query2);
 	header('Location: prompt.php?x=13');

 }

 if(isset($_POST['send'])){
    
 	if(user_id()==1){
	    $message = "You haven't logged in yet!";
	    echo "<script type='text/javascript'>alert('$message')</script>"; 
	}

	if(user_id()==3){
         $message = "You can't send messages to yourself!";
    echo "<script type='text/javascript'>alert('$message')</script>";   

 	}
 }



?>
<!doctype html>
<html lang = 'en'>
<head>
	<title>Main Page</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
    <link rel = 'stylesheet' href = 'css/item.css'>
</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
		<aside id = 'left_side'> 
		<?php IndexCategoryList()?>
		</aside>
		
	    <section id = 'right_side1'>
	    <section id = 'right_side11'>
		 <?php pic();?>
		 <section id = 'right_side12'>
		 <?php basic_info();?>
		 </section>
		</section>

		 <section id = 'right_side13'>
		 	<?php description()?>
		 </section>
 
       <?php 
       
       if(user_id()==1){
       	;}else{
       		selection();
       	}
        ?>
       
	    </section>

	  


		<?php footerCode(); ?>

	</div>
</body>
</html>
