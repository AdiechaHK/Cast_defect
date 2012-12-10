    <div class="span10">
      <!--Body content-->
      <?php echo anchor("casting/add_item", "<i class='icon-plus icon-white'></i> Add", array('class' => "btn btn-primary pull-right")); ?>
      <br><br>
      <table class="table">
        <thead>
        <tr><th>#</th><th>Title</th><th><span class="pull-right">Action</span></th></tr>
        </thead>
        <tbody>
        <?php
        $count = 1; 
        foreach ($result as $row) {
          # code...
          ?>
          <tr><td><?php echo $count; ?></td>
          <td><?php echo $row->title; ?></td>
          <td><span class="pull-right">
            <?php echo anchor("casting/edit_item/".$row->id, "<i class='icon-cog icon-white'></i> Edit", array('class' => 'btn btn-info')); ?>
            <?php echo anchor("casting/remove_item/".$row->id, "<i class='icon-trash icon-white'></i> Remove", array('class' => 'btn btn-danger')); ?>
          </span></td></tr>
          <?php
          $count++;
        }
        if ($count == 1) {
          # code...
          ?>
          <tr><td colspan="3">No result found</td></tr>
          <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>