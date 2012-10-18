<?php

include 'adminVerify.php';

include 'dbconfig.php';

$query = "delete from parameter where id=\"".$_GET['id']."\";";

$result = mysql_query($query);

header('location: param_list.php');

?>