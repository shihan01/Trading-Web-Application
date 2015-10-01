<?php
//calculate users pending items
function calculateUsersPendingItems($user){
	$result = mysql_query("SELECT item_number FROM items_availabe WHERE owner_id = $user 
	AND status = 'pending' ");
	if(mysql_num_rows($result)==0){return '';}else{
		return "(".mysql_num_rows($result).")";
	}
}

?>