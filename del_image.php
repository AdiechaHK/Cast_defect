<?php
include 'dbconfig.php';
$def = $_GET['def'];
$query = 'select image from image where defect="'.$def.'";';
$result = mysql_query($query);
while(list($url) = mysql_fetch_array($result)) {
	unlink($url);
}
$query = 'delete from image where defect="'.$def.'";';
mysql_query($query);
$query = 'update defects set image="0" where id="'.$def.'";';
mysql_query($query);
header("location: modify_image.php?id=$def");
?>