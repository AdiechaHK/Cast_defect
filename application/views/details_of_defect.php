<!-- body -->
<div class="container" id="bodyContent">
  <h3><?php echo $title; ?></h3>
  <hr>
  <div class="row-fluid">
    <div class="span8"><?php echo $description; ?></div>
    <div class="span4">
    <?php if(isset($image)){ ?>
      <img class="pull-right" src=<?php echo base_url("upload/".$image) ?> >
    <?php } ?>
    </div>
  </div>
  <hr>
  <div class="row-fluid">
  <?php if(isset($param_list)){ ?>
    <div class="span4 main-block">
    <h4>Affected Parametes</h4>
    <ul>
      <?php foreach ($param_list as $row) { ?>
        <li><strong><?php echo $row->title; ?> : </strong><?php echo $row->block; ?></li>
      <?php } ?>
    </ul>
    </div>
  <?php } ?>
  <?php if(isset($cr_list)){ ?>
    <div class="span8 main-block">
      <div class="row-fluid">
        <div><h4>Causes And Remedies</h4></div>
      </div>
      <div class="row-fluid">
        <div class="span6 sub-block">
          <h5>Causes</h5>
          <ul>
            <?php foreach ($cr_list as $cr_row) {
              # code...
              if($cr_row->type == "causes") { 
                echo "<li>".$cr_row->block."</li>"; 
              }
            } ?>
          </ul>
        </div>
        <div class="span6 sub-block">
          <h5>Remedies</h5>
          <ul>
            <?php foreach ($cr_list as $cr_row) {
              # code...
              if($cr_row->type == "remedies") { 
                echo "<li>".$cr_row->block."</li>"; 
              }
            } ?>
          </ul>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
  <br>
  <a class="btn" href=<?php echo site_url("home/defects_list") ?> ><i class="icon-chevron-left"></i> Back</a>
</div>