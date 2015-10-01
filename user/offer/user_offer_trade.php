<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');



function searchItem(){
$id = $_SESSION['user_id'];
$query = "SELECT `items_traded`, `title` FROM `items_traded` WHERE `owner_id` = '".mysql_real_escape_string($id)."'";
$query_run = mysql_query($query);
if(mysql_num_rows($query_run)==0){
	echo "<P>Sorry, there is no such item.</p>";
}else{ 
      while($result = mysql_fetch_assoc($query_run)){
            $item_number = $result['items_traded'];
            $item_title = $result['title'];
            $query1 = "SELECT `title`,`owner_id`, `image_path1` FROM `items_traded` WHERE `item_number` = '$item_number'";
            $query_run1 =mysql_query($query1);

            echo "<table><tr id = 'search1'>
			      <td>Title</td>
			      <td>Image</td>
			      <td>Owner Name</td>
			      <td>Item Traded</td>
			      </tr>";
			while ($result1 = mysql_fetch_assoc($query_run1)){
				echo "<tr id = 'search2'><td>";
				$result11=$result1['title'];
				echo "$result11";
				echo"</td>";

				echo "<td>";
				$result2=$result1['image_path1'];
				echo "<img id = 'img1' src = '$result2' >";
				echo"</td>";

				echo "<td>";
				$result3=$result1['owner_id'];
				$query12 = "SELECT `username` FROM `users` WHERE `user_id` = '$result3'";
		        $query_run12 =mysql_query($query12);
		        while($result_id = mysql_fetch_assoc($query_run12)){
		            $result31=$result_id['username'];  
		        }
				echo "$result31";
				echo"</td>";

				echo "<td>";
				echo "$item_title";
				echo "</td>";
				echo "</tr>";
        		
		}
     }
}

$query = "SELECT `title`,`owner_id`, `image_path1`, `items_traded` FROM `items_traded` WHERE `owner_id` = '".mysql_real_escape_string($id)."'";
$query_run =mysql_query($query);
if(mysql_num_rows($query_run)==0){
	echo "<P>Sorry, there is no such item.</p>";
}else{
	echo "<table><tr id = 'search1'>
	      <td>Title</td>
	      <td>Image</td>
	      <td>Item Traded</td>
	      <td>Owner Name</td>
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
		$result3=$result['items_traded'];
		$query1 = "SELECT `title`,`owner_id` FROM `items_traded` WHERE `item_number` = '$result3'";
        $query_run1 =mysql_query($query1);
        while($result_id = mysql_fetch_assoc($query_run1)){
            $result31=$result_id['title'];  
            echo "$result31";
		    echo"</td>";

            echo "<td>";
		    $result4=$result_id['owner_id'];
		    $query4 = "SELECT `username` FROM `users` WHERE `user_id` = '$result3'";
            $query_run4 =mysql_query($query4);
            while($result_id = mysql_fetch_assoc($query_run4)){
            $result31=$result_id['username'];  
            }
		    echo "$result31";
		    echo"</td>";
		    echo "</tr>";

        }
		
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
