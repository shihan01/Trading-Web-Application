<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');



function user(){
	if(isset($_GET['id'])){
		if(!empty($_GET['id'])){
			$user_id = $_GET['id'];
			$query = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
		    $query_run = mysql_query($query);
		    while ($result = mysql_fetch_assoc($query_run)) {
		    	$username = $result['username'];
		    	$email = $result['email'];
		    }
		
	       echo "<h1 id = 'search1'>Name: $username</h1>";
	       echo "<h4 id = 'search1'>ID: $user_id</h4>";
	       echo "<h1 id = 'search1'>Email: $email</h1>";
	   
	       
		}
	}
 }

function searchItem(){
    $user_id = $_GET['id'];
    $query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted` FROM `items_available` WHERE `owner_id` = '$user_id'";
    $query_run = mysql_query($query);
	if(mysql_num_rows($query_run)==0){
		echo "<P>Sorry, there is no such item.</p>";
	}else{
		echo "<table><tr id = 'search1'>
		      <td>Title</td>
		      <td>Image</td>
		      <td>Owner Name</td>
		      <td>Item Wanted</td>
		      </tr>";
		while ($result = mysql_fetch_assoc($query_run)){
			echo "<tr id = 'search2'><td>";
			$result1=$result['title'];
			echo "$result1";
			echo"</td>";
            
            echo "<td>";
			$result2=$result['image_path1'];
			echo "<img id = 'img1' src = '$result2' >";
			echo"</td>";
            
			echo "<td>";
			$result3=$result['owner_id'];
			$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$result3'";
            $query_run1 =mysql_query($query1);
            while($result_id = mysql_fetch_assoc($query_run1)){
                $result31=$result_id['username'];  
            }
			echo "$result31";
			echo"</td>";


            echo "<td>";
			$result5=$result['items_wanted'];
			echo "$result5";
			echo"</td>";
			echo "</tr>";
		}

		 echo "</table>";
      }

	}


 
 if(isset($_GET['select'])){
 	$query2 = "INSERT INTO `offers_open` VALUES('','$id1','$item_number1','$owner_id','$item_number','','')";
 	$query_run2 = mysql_query($query2);
 	header('Location: prompt.php?x=13');

 }



?>
<!doctype html>
<html lang = 'en'>
<head>
	<title>Main Page</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	
    <link rel = 'stylesheet' href = 'css/user.css'>
</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
		<aside id = 'left_side'> 
		<?php IndexCategoryList()?>
		</aside>
		
	    <section id = 'right_side1'>
	     <section id = 'right_side11'>
		<?php user();?>
		 </section>
        <?php searchItem() ?>
	    </section>

	    <section id = 'right_side2'>
		<?php active_item();?>
	    </section>


		<?php footerCode(); ?>

	</div>
</body>
</html>
