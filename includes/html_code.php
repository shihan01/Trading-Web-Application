<?php

function headerAndSearchCode(){

  if(isset($_GET['keywords'])){
  $default = htmlentities($_GET['keywords']);}
     
  if(isset($_GET['category'])&&isset($_GET['keywords'])){
    $category = $_GET['category'];
    $keywords = $_GET['keywords'];

    if($keywords == 'All Categories'){
     
      header("Location: search.php?y=$category ");
    }else{
      header("Location: search2.php?y=$category&yy=$keywords");
    }
  }

  echo '
      <header id = "main_header">
          <div id = "rightAlign">

  ';
   
   topRightLinks();
  //links will be here

  echo "
       </div>
       <a href = 'index.php'><img src = \"images/mainlogo.jpg\"></a>
       </header>


       <div id = 'top_search'>
       <form name = 'input' action = '#' method = 'GET'>
       <input type ='text' id ='keywords' name = 'keywords' size = '100' class = 'searchBox'
        value = \"All Categories\"> &nbsp;
        <select id = 'category' name = 'category' class = 'searchBox'>
  ";
  // include categories here
  createCategoryList();
   echo "
       </seclect>
       <input type = 'submit' value =' Search ' class= 'button'>
       </form>
       </div>
   ";

}

//Top Right Links

function topRightLinks(){
  if(!isset($_SESSION['user_id'])){
  	echo '<a href = "register.php">Register</a> | <a href = "login.php">Log in</a> ';
  }else{
  	     $x = $_SESSION['user_id'];
  	     $result = mysql_query("SELECT * FROM `messages` WHERE `receiver` = $x  AND `status` = 'unread'") or
  	     die(mysql_error());
  	     $num = mysql_num_rows($result);
  	     if($num==0){
  	     	echo '<a href = "user_message_r.php">Messages</a>';
  	     }else{
            echo "<span class = \"usernames\"><a href = \"message_inbox.php\">Messages($num)</a></span>";
  	     }
        echo '<a href = "user_profile.php"> | My Account</a> | <a href = "logout.php">Log Out</a>';
  }

}

//Create Category <option>'s for search bar

function createCategoryList(){
	if( ctype_digit($_GET['category'])){
		$x = $_GET['category'];
	}else{
		$x = 99;
 }
  //echo "<option>All Categories</option>";
  $i = 0;
  while(1){
  	if (numberToCategory($i)=="Category doesn't exist"){
  		break;
  	}else{
  		echo"<option value=\"$i\"";
  		if($i==$x){
  			echo 'SELECTED';
  		}
  		echo ">";
  		echo numberToCategory($i);
  		echo "</option>";
  	}

  	$i++;
  }

}


function IndexCategoryList(){
 
  echo "<table>";
  $i = 0;
  while(1){
    if (numberToCategory($i)=="Category doesn't exist"){
      break;
    }else{
      echo"<tr ><td id ='indextable'><a value=\"$i\" href = 'search.php?y=$i'>";
      echo numberToCategory($i);
      echo "</a></td></tr>";
    }

    $i++;
  }
     echo "</table>";

}


//Category Number to String
function numberToCategory($n){
	switch($n){
		case 0:
		$cat = "All Categories";
		break;

		case 1:
		$cat = "Antiques";
		break;

		case 2:
		$cat = "Appliances";
		break;

		case 3:
		$cat = "Automotive";
		break;

		case 4:
		$cat = "Baby";
		break;

		case 5:
		$cat = "Beauty";
		break;

		case 6:
		$cat = "Books";
		break;

		case 7:
		$cat = "CDs";
		break;

    case 8:
    $cat = "Clothes";
    break;

    case 9:
    $cat = "Cellphones & Accessories";
    break;

    case 10:
    $cat = "Digital Music";
    break;

    case 11:
    $cat = "Electronics";
    break;

    case 12:
    $cat = "Gift Cards";
    break;

    case 13:
    $cat = "Home & Kitchen";
    break;

    case 14:
    $cat = "Music Instruments";
    break;

    case 15:
    $cat = "Category doesn't exist";
    break;
	  
	}

	   return $cat;
}
     function footerCode(){
     	echo '
      
     	<footer id = "main_footer">
     	 <table>
     	 <tr>
     	  <td> Copyright  2014</td>
     	  <td> <a href = "google.com">Shihan Shen</a></td>
     	  <td> <a href = "facebook.com">Shihan Shen</a></td>

     	 </tr>
         </table>
        </footer>
     	';
     }

     function confirmation(){
        header('Content-type: image/jpeg');

        $text = rand(1000,9999);
        $text_size = 30;
        $image_width = 200;
        $image_height = 45;
        $image = imagecreate($image_width, $image_height);
        imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        imagettftext($image, $text_size, 0, 15, 35, $text_color, 'DroidSans.ttf', $text);
        for($x=0; $x<40; $x++){
          $x1 = rand(0,100);
          $y1 = rand(0,100);
          $x2 = rand(0,100);
          $y2 = rand(0,100);
          imageline($image, $x1, $y1, $x2, $y2, $text_color);
        }
        imagejpeg($image);

     }

function add_category(){
  echo "<select id = 'category' name = 'add_category' >";
  createCategoryList();
  echo "</select>";

}

function active_user(){
  $query = "SELECT `username` FROM `users` WHERE `credits`>'10' ORDER BY `credits` ASC";
   $query_run =mysql_query($query);
   echo "<table id = 'index11'> <p id ='indextable'>Top Users: </p>";
    while ($result = mysql_fetch_assoc($query_run)){
      echo "<tr><td id ='indextable'>";
      $user=$result['username'];
      echo "$user";
      echo "</td></tr>";
    }

     echo "</table>";
   }

function active_item(){
  $query = "SELECT `title`,`owner_id`, `image_path1`, `items_wanted`,`item_number` FROM `items_available`";
  $query_run =mysql_query($query);
  if(mysql_num_rows($query_run)==0){
    echo "<P>Sorry, there is no such item.</p>";
  }else{
    echo "
         <table id = 'index12'>
         <tr><td id = 'text1'>Most Popular Items:</td></tr>
         <tr id = 'search1'>
          <td>Image</td>
          <td>Title</td>
          <td>Owner Name</td>
          <td>Item Wanted</td>
          </tr>";
    while ($result = mysql_fetch_assoc($query_run)){
      
            
      echo "<tr id = 'search2'><td>";
      $result2=$result['image_path1'];
      echo "<img id = 'img1' src = '$result2' >";
      echo"</td>";

      echo "<td>";
      $result3=$result['item_number'];
      $result1=$result['title'];
      echo "<a href = 'item_page.php?id=$result3'> $result1</a>";
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


function right_bar(){
  echo " <aside id = 'left_side'> 

    <ul id ='generalform1' >
      Account Info
      <li id = 'single'><a href = 'user_profile.php'>Profile</a></li>
      <li id = 'single'><a href = 'password.php'>Change Password</a></li>
    </ul>
    <ul id ='generalform1' >
      Items
      <li id = 'single'><a href = 'user_active.php'>Active</a></li>
      <li id = 'single'><a href = 'user_pending.php'>Pending</a></li>
      <li id = 'single'><a href = 'account_itemsactive.php'>Add Item</a></li>
    </ul>
      <ul id ='generalform1'>
        Trades
        <li id = 'single'><a href = 'user_offer_r.php'>Offers Received</a></li>
        <li id = 'single'><a href = 'user_offer_m.php'>Offers Made</a></li>
        <li id = 'single'><a href = 'user_offer_a.php'>Offers Accepted</a></li>
        <li id = 'single'><a href = 'user_offer_d.php'>Offers Declined</a></li>
        <li id = 'single'><a href = 'user_offer_trade.php'>Completed Trades</a><li>
      </ul>

      <ul id ='generalform1'>
        Messages
        <li id = 'single'><a href = 'user_message_r.php'>Inbox</a></li>
        <li id = 'single'><a href = 'user_message_s.php'>Sent</a></li>
        <li id = 'single'><a href = 'user_compose_message.php'>Compose</a></li>
        <li id = 'single'><a href = 'user_message_t.php'>Trash</a></li>

      </ul>
    </aside>";
}


?>


















