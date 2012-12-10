<html>
<head>
  <title>Cast Defects</title>
    <link href=<?php echo base_url("public/css/bootstrap.min.css"); ?> rel="stylesheet">
    <link href=<?php echo base_url("public/css/bootstrap-responsive.min.css"); ?> rel="stylesheet">
    <link href=<?php echo base_url("public/css/core.css"); ?> rel="stylesheet">
    
    <script src=<?php echo base_url("public/js/jquery.js"); ?> ></script>
    <script src=<?php echo base_url("public/js/bootstrap.min.js"); ?> ></script>
    <script src=<?php echo base_url("public/js/core.js"); ?> ></script></head>
<body>
<!-- Header -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="./">Cast Defect</a>
      <ul class="nav">
        <li><?php echo anchor("home/defects_list","Types of Defects"); ?></li>
      </ul>
      <ul class="nav pull-right" id="accBox">
        <?php if($user_name) { ?>
          <li><?php echo anchor("panel/home", "Admin Panel"); ?></li>
          <li class="divider-vertical"></li>
          <li><?php echo anchor("admin/sign_out", "Sign Out"); ?></li>
        <?php } else { ?>
          <li><?php echo anchor("admin/sign_in", "Sign In"); ?></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div><!-- 
<div class="modal fade hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
    <h3 id="myModalLabel">Sign In (only for administrator)</h3>
  </div>
  <div class="modal-body form-horizontal">
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls">
        <input type="text" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
        <input type="password" id="inputPassword" placeholder="Password">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" id="signIn" redirectRef=<?php // echo site_url("admin/sign_in"); ?> >Sign In</button>
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
</div> -->
