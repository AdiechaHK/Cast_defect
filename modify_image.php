<?php include 'adminVerify.php'; ?>
<html>
<head>
<title> Admin Pannel </title>
<?php include 'head.php'; ?>
<script src="./public/js/param.js"></script>
</head>
<body>
  <?php include 'header.php'; ?>
  <?php
    include 'dbconfig.php';
    $def = $_GET['id'];
    $query = 'select title, image from defects where id="'.$def.'";';
    $result = mysql_query($query);
    if(mysql_num_rows($result)==1){
      $row = mysql_fetch_array($result);
      $title = $row['title'];
      $imgFlag = $row['image'];
    }
  ?>
  <div class="container" id="bodyContent">
    <h2>Set Image for <?php echo $title; ?></h2>
    <?php if($imgFlag) { ?>
    <div>
      <?php
        $query = "select image from image where defect=\"".$def."\";";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==1){
          $row = mysql_fetch_array($result);
          $url = $row['image'];
        } else {
          echo "Image not set yet.";
          // $query = "select entries from count where entity=\"def_img\";";
          // $result = mysql_query($query);
          // $row = mysql_fetch_array($result);
          // $url = "private/img/defect_".$row['entries'];
        }
      ?>
      <img alt="No image" class="img-rounded" src=<?php echo $url; ?> >
    </div>
    <?php } ?><br>
    <form action="inst_image.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="def" value=<?php echo $def; ?> >
      <input type="file" name="file"><br><br>
      <a href="defect_list.php" class="btn"><i class="icon-hand-left"></i>  Back</a> &nbsp;
      <?php if(isset($url)) { ?>
        <a href=<?php echo "del_image.php?def=".$def; ?> class="btn btn-danger"><i class="icon-trash icon-white"></i>  Delete</a> &nbsp;
      <?php } ?>
      <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Update</button>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>