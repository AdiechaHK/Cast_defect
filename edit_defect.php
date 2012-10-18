<?php

include 'adminVerify.php';

include 'dbconfig.php';

$query = "select id, title, description from defects where id=\"".$_GET['id']."\";";

$result = mysql_query($query);

if(mysql_num_rows($result) == 1) {

	$defect = mysql_fetch_array($result);

	$title = "Edit Defect";

	include 'defect_form.php';

} else {

	$_SESSION['user_error'] = "Record conflicts";

	header('location: defect_list.php');

} 


?>