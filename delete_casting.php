<?php
include 'adminVerify.php';
include 'dbconfig.php';
$query = "select image from casting where id=\"".$_GET['id']."\";";
$result = mysql_query($query);
if(mysql_num_rows($result) == 1) {
	$row = mysql_fetch_array($result);
	$image = $row['image'];
	unlink($image);
	$query = "delete from casting where id=\"".$_GET['id']."\";";
	$result = mysql_query($query);
} else {
	$_SESSION['user_error'] = "Record conflicts";
	header('location: adminPanel.php');
} 
?>