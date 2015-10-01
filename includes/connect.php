<?php
 $connect = mysql_connect('localhost', 'sirius_user', '9004401');
 //$connect = mysql_connect('localhost', 'root', '');

 if(!$connect){
 	die('Could not connect!'.mysql_error());
 }

 $db_selected = mysql_select_db("sirius_shihan");

 if(!$db_selected){
 	die('Could not select database'.mysql_error());
 }

 ob_start();

?>