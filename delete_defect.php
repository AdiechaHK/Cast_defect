<?php

include 'adminVerify.php';

include 'dbconfig.php';

$query = "delete from defects where id=\"".$_GET['id']."\";";

$result = mysql_query($query);

header('location: defect_list.php');

?>