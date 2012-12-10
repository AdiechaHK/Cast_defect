<div class="container" id="bodyContent">
<?php 
if($error){
?>
<div class="alert alert-error">
    <button id="remove-alert-error" class="close" data-dismiss="alert" ref=<? echo site_url("admin/remove_error"); ?> >&times;</button>
    <strong>Error!</strong><br> <?php echo $error_msg; ?>
</div>
<?php
}
$form_attr = array('class' => "form-horizontal");
echo form_open("admin/sign_in_submit", $form_attr); 
?>
  <fieldset>
    <legend>Sign In</legend>
    <div class="control-group">
      <label class="control-label" for="email">Email:</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="email" name="email">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="password">Password:</label>
      <div class="controls">
        <input type="password" class="input-xlarge" id="password" name="password">
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" class="btn btn-primary" value="Sign In" >
      <?php 
        echo anchor("", "Cancel", array('class' => 'btn')); 
      ?>
    </div>
  </fieldset>
</form>
</div>