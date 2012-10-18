<?php

include 'adminVerify.php';

$id = $_POST['id'];

$title = $_POST['title'];
$description = $_POST['description'];
  
include 'dbconfig.php';
  
if($id == -1){
    
    $query = "insert into defects (title, description) values (\"".$title."\", \"".$description."\");";

  } else {

    $query = "update defects set title=\"".$title."\", description=\"".$description."\" where id=\"".$id."\";";

  }

  $result = mysql_query($query);

  header("location: defect_list.php");

?>