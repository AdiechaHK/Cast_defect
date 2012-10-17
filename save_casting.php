<?php
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
  include 'adminVerify.php';
  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  include 'dbconfig.php';
  if($id == -1){
    $query = "select entries from count where entity=\"casting_image\";";
    echo $query;
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $count = $row['entries'];
    $count = $count + 1;
    $image = "private/img/casting_".$count.".".$extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], $image);
    $query = "update count set entries=\"".$count."\" where entity=\"casting_image\";";
    $result = mysql_query($query);
    $query = "insert into casting (title, description, image) values (\"".$title."\", \"".$description."\", \"".$image."\");";
    $result = mysql_query($query);
  } else {
    $query = "select image from casting where id=\"".$id."\";";
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1){
      $row = mysql_fetch_array($result);
      $image = $row['image'];
      if ($_FILES["file"]["error"] > 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $image);
      }
      $query = "update casting set title=\"".$title."\", description=\"".$description."\" where id=\"".$id."\";";
    } else {
      $_SESSION['user_error'] = "Improper image naming";
    }
  }
  $result = mysql_query($query);
  header("location: adminPanel.php");
?>