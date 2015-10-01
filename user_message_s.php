<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

function searchItem(){

	 $query = "SELECT `receiver`, `subject`, `body` FROM `messages` WHERE `sender` = '".mysql_real_escape_string($_SESSION['user_id'])."'";
	//$query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted` FROM `items_available` WHERE `category` = '".mysql_real_escape_string($y)."'";
	$query_run =mysql_query($query);
	if(mysql_num_rows($query_run)==0){
		echo "<P>Sorry, you don't have any messages.</p>";
	}else{
		echo "<table><tr id = 'search1'>
		      <td>From</td>
		      <td>Subject</td>
		      <td>Body</td>
		      <td>Delete</td>
		      </tr>";
		while ($result = mysql_fetch_assoc($query_run)){
			echo "<tr id = 'search2'><td>";
			$result1=$result['receiver'];
			$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$result1'";
            $query_run1 = mysql_query($query1);
            while($result11 = mysql_fetch_assoc($query_run1)){
                $result12 = $result11['username'];
            }
			echo "$result12";
			echo"</td>";
            
            echo "<td>";
			$result2=$result['subject'];
			echo "$result2";
			echo"</td>";

			echo "<td>";
			$result3=$result['body'];
			echo "<p maxlength = '100'>";
			echo "$result3";
			echo "</p>";
			echo"</td>";
            

            echo "<td>";
			echo "<a href = ''> <input type='Button' name = 'delete' value = 'Delete'> </a>";
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
