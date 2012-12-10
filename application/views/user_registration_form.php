<!-- body -->
<div class="container" id="bodyContent">
<?php
$attributes = array('class' => 'form-horizontal');
echo form_open('admin/add_user', $attributes);
?>
  <fieldset>
  <legend>Add User</legend>
  <div class="control-group">
    <label class="control-label" for="inputName">Name</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="Name" name="name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" name="email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-actions">
    <button type="submit" class="btn btn-primary">Save user</button>
    <a href=<?php echo base_url(''); ?> class="btn">Cancel</a>
  </div>  
  </fieldset>
</form>
</div>
