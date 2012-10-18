<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
    <a class="brand" href="./">Cast Defect</a>
      <ul class="nav pull-right" id="accBox">
        <?php if(isset($_SESSION['user_name'])) { ?>
          <li><a href="adminPanel.php">Admin Pannel</a></li>
          <li class="divider-vertical"></li>
          <li><a href="#" id="signOut">Sign Out</a></li>
        <?php } else { ?>
          <li><a href="#myModal" data-toggle="modal">Sign In</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
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
    <button class="btn btn-primary" id="signIn">Sign In</button>
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
</div>
