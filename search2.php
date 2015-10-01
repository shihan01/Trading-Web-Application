<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');


function searchItem(){
	if(isset($_GET['y'])&&isset($_GET['yy'])){
     $y = $_GET['y'];
     $yy = $_GET['yy'];
     if($y==0){
     	 $query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted`,`item_number` FROM `items_available` WHERE  `title` LIKE '%".mysql_real_escape_string($yy)."%'";
     }
     else{
     	 $query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted`,`item_number` FROM `items_available` WHERE `category` = '".mysql_real_escape_string($y)."' AND `title` LIKE '%".mysql_real_escape_string($yy)."%'";
     }
	 
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
			$result11 = $result['item_number'];
			echo "<a href = 'item_page.php?id=$result11'> $result1</a>";
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

}

?>
<!doctype html>
<html lang = 'en'>
<head>
	<title>Main Page</title>
	<link rel = 'stylesheet' href = 'css/main.css'>
	<link rel = 'stylesheet' href = 'css/form.css'>
	<link rel = 'stylesheet' href = 'css/search.css'>

</head>

<body>
	<div id = 'wrapper'>
       <?php headerAndSearchCode();?>
		<aside id = 'left_side'> 
		<?php IndexCategoryList()?>
		</aside>
		
		<section id = 'right_side'>
         <?php searchItem();?>
		</section>
		
		<?php footerCode(); ?>

	</div>
</body>
</html>