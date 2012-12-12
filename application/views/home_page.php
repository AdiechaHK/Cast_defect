<!-- body -->
<div class="container" id="bodyContent">
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <?php
        $first = true;
        foreach ($cast_list as $casting) { 
      ?>
      <?php if($first) {
        $first = false;
      ?>
        <div class="item active">
      <?php } else { ?>
        <div class="item">
      <?php } ?>      
        <img style="width:800px; height:600px; border-radius: 10px" width="800px" height="600px" src=<?php echo base_url("upload/".$casting->image); ?> alt="No Image Available">
        <div style="border-top-left-radius: auto;border-top-right-radius: auto;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;" class="carousel-caption">
          <h4><?php echo $casting->title; ?></h4>
          <p><?php echo $casting->description; ?></p>
        </div>
      </div>
      <?php } ?>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
