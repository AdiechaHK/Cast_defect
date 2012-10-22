<?php   session_start(); ?>
<html>
<head>
  <title>Test</title>
  <?php include 'head.php'; ?>
</head>
<body>
<!-- Header -->
<?php include 'header.php'; ?>
<!-- body -->
<div class="container" id="bodyContent">
  <?php
    include 'dbconfig.php';
    $query = "select title, description, image from casting;";
    $result = mysql_query($query);

    if(mysql_num_rows($result) == 0) {
      ?>
      <center>
      <h1> No Casting Type found</h1>
      </center>
      <?php
    } else {
      ?>
      <div id="myCarousel" class="carousel slide"  style="height: 600px; width: 800px; margin: auto;">
        <div class="carousel-inner" >
          <?php while($row = mysql_fetch_array($result)) { ?>
            <div class="item" style="height: 600px; width: 800px;">
              <img src=<?php echo $row['image']; ?> alt="No Image"  width="100%">
              <div class="carousel-caption">
                <h4><?php echo $row['title']; ?></h4>
                <p><?php echo $row['description']; ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      </div>
      <?php
    }
  ?>
</div>
<!-- Footer -->
<?php 
include 'footer.php'; 
?>
</body>
</html>