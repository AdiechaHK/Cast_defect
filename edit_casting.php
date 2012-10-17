<?php
include 'adminVerify.php';
include 'dbconfig.php';
$query = "select id, title, description from casting where id=\"".$_GET['id']."\";";
$result = mysql_query($query);
if(mysql_num_rows($result) == 1) {
	$casting = mysql_fetch_array($result);
	$title = "Edit Casting";
	include 'casting_form.php';
} else {
	$_SESSION['user_error'] = "Record conflicts";
	header('location: adminPanel.php');
} 

?>