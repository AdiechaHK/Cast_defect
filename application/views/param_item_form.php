    <div class="span10">
      <?php
        if(isset($id)) echo form_open('param/save_item', array('class' => 'form-horizontal'), array('id' => $id));
        else echo form_open('param/save_item', array('class' => 'form-horizontal'));
      ?>
        <fieldset>
          <legend><?php echo $title_text; ?></legend>
          <div class="control-group">
            <label class="control-label" for="title">Title:</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="title" name="title" value=<?php echo "'".$title."'"; ?> >
            </div>
          </div>
          <div class="form-actions">
            <input type="submit" class="btn btn-primary" value=<?php echo "'".$title_text."'"; ?> >
            <?php 
              echo anchor("param/item_list", "Cancel", array('class' => 'btn')); 
            ?>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>