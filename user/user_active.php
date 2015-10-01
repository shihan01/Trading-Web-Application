<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

function searchItem(){

	$query = "SELECT `item_number`,`title`, `image_path1`, `items_wanted` FROM `items_available` WHERE `owner_id` = '".mysql_real_escape_string($_SESSION['user_id'])."'";
	$query_run =mysql_query($query);
	if(mysql_num_rows($query_run)==0){
		echo "<P>Sorry, you don't have any items.</p>";
	}else{
		echo "<table><tr id = 'search1'>
		      <td>Title</td>
		      <td>Image</td>
		      <td>Item Wanted</td>
		      <td>Edit</td>
		      <td>Delete</td>
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
			$result3=$result['items_wanted'];
			echo "$result3";
			echo"</td>";
            
			echo "<td>";
			$result4=$result['item_number'];
			echo"<a href = \" user_edit_item.php?id=$result4 \"> <input type='Button' value = 'Edit'></a>";
			echo"</td>";


            echo "<td>";
			echo "<a href = \" user_delete_item.php?id=$result4 \"> <input type='Button' name = 'delete' value = 'Delete'> </a>";
			echo"</td>";
			echo "</tr>";
		}

		 echo "</table>";
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
	<link rel = 'stylesheet' href = 'css/search.css'>


</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
	   <?php right_bar();?>
	
          
		<section id = 'right_side'>
         <?php searchItem();?>
		</section>
		
		<?php footerCode(); ?>

	</div>
</body>
</html>
