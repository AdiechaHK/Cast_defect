<?php

// Image Naming
$extension = end(explode(".", $_FILES["file"]["name"]));
include 'dbconfig.php';
$query = "select entries from count where entity=\"def_img\";";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$count = $row['entries'];
$count = $count + 1;
$url = "private/img/defect_".$count.".".$extension;

// Image Moving with new name
move_uploaded_file($_FILES["file"]["tmp_name"], $url);

// Remove old entries and value if exists
$def = $_POST['def'];
$query = 'select id, image from image where defect="'.$def.'";';
$result = mysql_query($query);
while(list($id, $urlTmp) = mysql_fetch_array($result)) {
	unlink($urlTmp);	
	$query = 'delete from image where id="'.$id.'";';
	mysql_query($query);
}

// Insert new value
$query = 'insert into image (`defect`, `image`) values ("'.$def.'", "'.$url.'");';
mysql_query($query);
$query = 'update defects set image="1" where id="'.$def.'";';
mysql_query($query);
header("location: modify_image.php?id=$def");
?>