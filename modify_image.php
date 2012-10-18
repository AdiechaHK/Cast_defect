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
        $query = "select url from image where defect=\"".$def."\";";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==1){
          $row = mysql_fetch_array($result);
          $url = $row['url'];
          $src = $url;
        } else {
          $query = "select entries from count where entity=\"def_img\";";
          $result = mysql_query($query);
          $row = mysql_fetch_array($result);
          $url = "private/img/defect_".$row['entries'];
        }
      ?>
      <img alt="No image" class="img-rounded" width="300" height="200" src=<?php echo $src; ?> >
    </div>
    <?php } ?>
    <form action="inst_image.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="url" value=<?php echo $url; ?> >
      <input type="file" name="file"><br>
      <input class="btn" type="submit" value="submit">
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>