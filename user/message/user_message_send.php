<?php
session_start();
include('includes/connect.php');
include('includes/html_code.php');

function searchItem(){

	$query = "SELECT `receiver`,`sender`, `subject`, `body`,`date_send` FROM `messages` WHERE `sender` = '".mysql_real_escape_string($_SESSION['user_id'])."'";
	//$query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted` FROM `items_available` WHERE `category` = '".mysql_real_escape_string($y)."'";
	$query_run =mysql_query($query);
	if(mysql_num_rows($query_run)==0){
		echo "<P>Sorry, you don't have any messages.</p>";
	}else{
		echo "<table><tr id = 'search1'>
		      <td>From</td>
		      <td>To</td>
		      <td>Subject</td>
		      <td>Body</td>
		      <td>Date Sent</td>
		      <td>Delete</td>
		      </tr>";
		while ($result = mysql_fetch_assoc($query_run)){
			echo "<tr id = 'search2'><td>";
			$result1=$result['receiver'];
			$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$result1'";
			$query_run1 =mysql_query($query1);
            while($result_id = mysql_fetch_assoc($query_run1)){
                $result21=$result_id['username'];  
            }
			echo "$result21";
			echo"</td>";
            
            echo "<td>";
			$result2=$result['sender'];
			$query1 = "SELECT `username` FROM `users` WHERE `user_id` = '$result2'";
			$query_run1 =mysql_query($query1);
            while($result_id = mysql_fetch_assoc($query_run1)){
                $result21=$result_id['username'];  
            }
			echo "$result21";
			echo"</td>";

			echo "<td>";
			$result3=$result['subject'];
			echo "$result3";
			echo"</td>";
            
			echo "<td>";
			$result4=$result['body'];
			echo"$result4";
			echo"</td>";

			echo "<td>";
			echo "<a href = \" user_exchange_complete.php?id1=$result4&id2=$result2 \"> <input type='Button' name = 'Complete' value = 'Delete'> </a>";
			echo"</td>";
			

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
         <?php searchItem();?>
		</section>
		
		<?php footerCode(); ?>

	</div>
</body>
</html>
