    <div class="span10">
      <h4>Details</h4>
      <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
          <?php if(isset($selected) && $selected=="param") { ?>
            <li ><a href="#tab1" data-toggle="tab">Image</a></li>
            <li class="active"><a href="#tab2" data-toggle="tab">Parameters</a></li>
            <li ><a href="#tab3" data-toggle="tab">Causes & Remedies</a></li>
          <? } else if(isset($selected) && $selected=="cr") { ?>
            <li ><a href="#tab1" data-toggle="tab">Image</a></li>
            <li ><a href="#tab2" data-toggle="tab">Parameters</a></li>
            <li class="active"><a href="#tab3" data-toggle="tab">Causes & Remedies</a></li>
          <? } else { ?>
            <li class="active"><a href="#tab1" data-toggle="tab">Image</a></li>
            <li ><a href="#tab2" data-toggle="tab">Parameters</a></li>
            <li ><a href="#tab3" data-toggle="tab">Causes & Remedies</a></li>
          <? } ?>
        </ul>
        <div class="tab-content">
          <?php if(!isset($selected) || ($selected!="param" && $selected != "cr")) { ?>
            <div class="tab-pane active" id="tab1">
          <? } else { ?>
            <div class="tab-pane" id="tab1">
          <? } ?>
          <?php
            if(isset($id)) echo form_open_multipart('defect/save_image/'.$defect_id, array('class' => 'form-horizontal'), array('id' => $id));
            else echo form_open_multipart('defect/save_image/'.$defect_id, array('class' => 'form-horizontal'));
          ?>
            <fieldset>
              <div class="control-group">
                <label class="control-label">Existing Image:</label>
                <div class="controls">
                  <?php if($image!="no-image.jpg") { ?>
                    <input type="hidden" name="extFile" value=<?php echo "'".$image."'"; ?> >
                  <?php } ?>
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
          <?php if(isset($selected) && $selected=="param") { ?>
            <div class="tab-pane active" id="tab2">
          <? } else { ?>
            <div class="tab-pane" id="tab2">
          <? } ?>
            <table class="table" id="param-list-tbl">
              <thead>
                <tr><th>#</th><th>Title</th><th>Description</th><th>Action</th></tr>
              </thead>
              <tbody>
                <?php
                  $count = 1;
                  foreach ($param_list as $line) {
                    # code...
                    echo "<tr><td class='index'>$count</td><td class='title'>".$line->title."</td><td class='block'>".$line->block."</td><td>"; ?>
                    <?php echo "<a href='#' class='btn param-edit-btn' def-param='".$line->id."'>Edit</a>"; ?>
                    <?php echo "<a href='".site_url('defect/del_param/'.$line->id)."' class='btn param-del-btn'>Delete</a>"; ?>
                    <?php echo "</td></tr>";
                    $count++;
                  }
                ?>
                <?PHP echo "<tr id='form' form-target='".site_url('defect/save_defect_param/'.$defect_id)."'><td class='index'>".$count."</td><td><select id='title'>";
                      foreach ($aval_param_list as $aval_param) {
                        # code...
                        echo "<option value=".$aval_param->id.">".$aval_param->title."</option>";
                      }
                      echo "</select></td><td><input type='hidden' id='index' value='nan'><textarea id='block' style='height:70px;'></textarea></td><td><input id='param-save-btn' class='btn' type='submit' value='Save' ></td></tr>"; ?>
              </tbody>
            </table>
          </div>
          <?php if(isset($selected) && $selected=="cr") { ?>
            <div class="tab-pane active" id="tab3">
          <? } else { ?>
            <div class="tab-pane" id="tab3">
          <? } ?>
            <table class="table" id="cr-list-tbl">
              <thead>
                <tr><th>#</th><th>Type</th><th>Description</th><th>Action</th></tr>
              </thead>
              <tbody>
                <?php
                  $count = 1;
                  foreach ($cr_list as $line) {
                    # code...
                    echo "<tr><td class='index'>$count</td><td class='type'>".$line->type."</td><td class='block'>".$line->block."</td><td>"; ?>
                    <?php echo "<a href='#' class='btn cr-edit-btn' cr-id='".$line->id."'>Edit</a>"; ?>
                    <?php echo "<a href='".site_url('defect/del_cr/'.$line->id)."' class='btn cr-del-btn'>Delete</a>"; ?>
                    <?php echo "</td></tr>";
                    $count++;
                  }
                ?>
                <?PHP echo "<tr id='cr-form' form-target='".site_url('defect/save_cr/'.$defect_id)."'><td class='index'>".$count."</td><td><select id='cr-type'>";
                        echo "<option value='causes'>Causes</option>";
                        echo "<option value='remedies'>Remedies</option>";
                      echo "</select></td><td><input type='hidden' id='cr-index' value='nan'><textarea id='cr-block' style='height:70px;'></textarea></td><td><input id='cr-save-btn' class='btn' type='submit' value='Save' ></td></tr>"; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>