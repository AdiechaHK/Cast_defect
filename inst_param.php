<?php
include 'dbconfig.php';
$def = $_POST['def'];
$title = $_POST['title'];
$details = $_POST['detail'];
$query = 'insert into def_param (`defect`, `param`, `block`) values ("'.$def.'", "'.$title.'", "'.$details.'");';
mysql_query($query);
$query = 'update defects set parameter="1" where id="'.$def.'";';
mysql_query($query);
header("location: modify_param.php?id=$def");
?>