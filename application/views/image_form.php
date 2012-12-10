    <div class="span10">
      <?php
        if(isset($id)) echo form_open_multipart('defect/save_image/'.$defect_id, array('class' => 'form-horizontal'), array('id' => $id));
        else echo form_open_multipart('defect/save_image/'.$defect_id, array('class' => 'form-horizontal'));
      ?>
        <fieldset>
          <legend><?php echo $title_text; ?></legend>
          <div class="control-group">
            <label class="control-label">Existing Image:</label>
            <div class="controls">
              <?php if($image!="no-image.jpg") { ?>
                <input type="hidden" name="extFile" value=<?php echo "'".$image."'"; ?> >
              <?php }?>
              <img class="input-xlarge" src=<?php echo base_url("upload/".$image); ?> >
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="file">Image:</label>
            <div class="controls">
              <input type="file" class="input-xlarge" id="file" name="file">
            </div>
          </div>
          <div class="form-actions">
            <input type="submit" class="btn btn-primary" value=<?php echo "'".$title_text."'"; ?> >
            <?php if(isset($id)) echo anchor("defect/remove_image/".$defect_id, "Remove Image", array('class' => 'btn btn-danger')); ?>
            <?php echo anchor("defect/item_list", "Cancel", array('class' => 'btn')); ?>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>