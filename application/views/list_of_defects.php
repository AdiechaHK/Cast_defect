<div class="container" id="bodyContent">
<table class="table">
  <thead><tr><th colspan="2">List of Defect types</th></tr></thead>
  <tbody>
  <?php foreach($def_list as $record) { ?>
  <tr>
  <td><?php echo $record->title; ?></td>
    <?php if(isset($record->i_count) || isset($record->p_count) || isset($record->c_count)) { ?>
      <td><a class="btn pull-right" rel="tooltip" title=<?php echo "'Details of ".$record->title."'"; ?> href=<?php echo site_url("home/defect_detail/".$record->id); ?> ><i class="icon-ok"></i> Details</a></td>
    <?php } else { ?>
      <td><span class="btn pull-right" rel="tooltip" title=<?php echo '"'.$record->title.'\'s Details are not Available"'; ?> ><i class="icon-ban-circle"></i> Details</span></td>
    <?php } ?>
  </tr>
  <?php } ?>
  </tbody>
</table>
</div>
