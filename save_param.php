<?php

include 'adminVerify.php';

$id = $_POST['id'];

$title = $_POST['title'];
  
include 'dbconfig.php';
  
if($id == -1){
    
    $query = "insert into parameter (title) values (\"".$title."\");";

  } else {

    $query = "update parameter set title=\"".$title."\" where id=\"".$id."\";";

  }
  echo $query;
  $result = mysql_query($query);

  header("location: param_list.php");

?>