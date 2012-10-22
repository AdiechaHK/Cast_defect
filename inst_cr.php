<?php
include 'dbconfig.php';
$def = $_POST['def'];
$type = $_POST['type'];
$details = $_POST['detail'];
$query = 'insert into cos_rem (`defect`, `type`, `block`) values ("'.$def.'", "'.$type.'", "'.$details.'");';
mysql_query($query);
$query = 'update defects set causesAndRemedies="1" where id="'.$def.'";';
mysql_query($query);
header("location: modify_cr.php?id=$def");
?>