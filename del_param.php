<?php
include 'dbconfig.php';
$def = $_GET['def'];
$id = $_GET['id'];
$query = 'delete from def_param where id="'.$id.'";';
mysql_query($query);
$query = 'select id from def_param where defect="'.$def.'";';
$result = mysql_query($query);
if(mysql_num_rows($result) == 0) {
	$query = 'update defects set parameter="0" where id="'.$def.'";';
	mysql_query($query);
}
header("location: modify_param.php?id=$def");
?>