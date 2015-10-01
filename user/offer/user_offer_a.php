<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

function searchItem(){

	 $query = "SELECT `receivers_item`,`offerers_item`, `offerers_id`, `receivers_item` FROM `offers_accepted` WHERE `receivers_id` = '".mysql_real_escape_string($_SESSION['user_id'])."'";
	//$query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted` FROM `items_available` WHERE `category` = '".mysql_real_escape_string($y)."'";
	$query_run =mysql_query($query);
	if(mysql_num_rows($query_run)==0){
		echo "<P>Sorry, you don't have any items.</p>";
	}else{
		echo "<table><tr id = 'search1'>
		      <td>Title</td>
		      <td>Image</td>
		      <td>Offerer</td>
		      <td>Exchange</td>
		      <td>Complete</td>
		      <td>Decline</td>
		      </tr>";
		while ($result = mysql_fetch_assoc($query_run)){
			echo "<tr id = 'search2'><td>";
			$result1=$result['receivers_item'];
			$query1 = "SELECT `image_path1` FROM `items_available` WHERE `item_number` = '$result2'";
			$query_run1 =mysql_query($query1);
            while($result_id = mysql_fetch_assoc($query_run1)){
                $result21=$result_id['title'];  
            }
			echo "$result21";
			echo"</td>";
            
            echo "<td>";
			$result2=$result['receivers_item'];
			$query1 = "SELECT `image_path1` FROM `items_available` WHERE `item_number` = '$result2'";
			$query_run1 =mysql_query($query1);
            while($result_id = mysql_fetch_assoc($query_run1)){
                $result21=$result_id['image_path1'];  
            }
			echo "<img id = 'img1' src = '$result21' >";
			echo"</td>";

			echo "<td>";
			$result3=$result['offerers_id'];
			$query2 = "SELECT `username` FROM `users` WHERE `user_id` = '$result3'";
			$query_run2 =mysql_query($query2);
			while($result_id = mysql_fetch_assoc($query_run2)){
                $result31=$result_id['username'];  
            }
			echo "$result31";
			echo"</td>";
            
			echo "<td>";
			$result4=$result['offerers_item'];
			echo"$result4";
			echo"</td>";

			echo "<td>";
		
			echo "<a href = \" user_exchange_complete.php?id1=$result4&id2=$result2 \"> <input type='Button' name = 'Complete' value = 'Delete'> </a>";
			echo"</td>";
			


            echo "<td>";
			echo "<a href = \" user_offer_decline.php?id1=$result4&id2=$result2 \"> <input type='Button' name = 'Decline' value = 'Delete'> </a>";
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
