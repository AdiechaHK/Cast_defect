<?php

include 'adminVerify.php';

include 'dbconfig.php';

$query = "select id, title from parameter where id=\"".$_GET['id']."\";";

echo $query;

$result = mysql_query($query);

if(mysql_num_rows($result) == 1) {

	$param = mysql_fetch_array($result);

	$title = "Edit Defect";

	include 'param_form.php';

} else {

	$_SESSION['user_error'] = "Record conflicts";

	header('location: param_list.php');

} 


?>