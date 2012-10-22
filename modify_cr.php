<?php include 'adminVerify.php'; ?>
<html>
<head>
<title> Admin Pannel </title>
<?php include 'head.php'; ?>
<script src="./public/js/param.js"></script>
</head>
<body>
  <?php include 'header.php'; ?>
  <?php
    include 'dbconfig.php';
    $def = $_GET['id'];
    $query = 'select title, parameter from defects where id="'.$def.'";';
    $result = mysql_query($query);
    if(mysql_num_rows($result)==1){
      $row = mysql_fetch_array($result);
      $title = $row['title'];
    }
  ?>
  <div class="container" id="bodyContent">
    <h2>List of Causes/Remedies for <?php echo $title; ?></h2>
    <br>
    <table class="table" id="tbl-param">
      <thead>
        <tr>
          <th>Type</th>
          <th>Details</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Code to place existing parameters
          $query = "select id, type, block from cos_rem where defect=\"".$def."\";";
          $result = mysql_query($query);
          while(list($id, $param, $block) = mysql_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $param; ?></td>
              <td><?php echo $block; ?></td>
              <td><a class="btn btn-danger" href=<?php echo "del_cr.php?id=$id&def=$def"; ?> >
                <i class="icon-trash icon-white"></i>  Delete 
              </a>
            </tr>
            <?php
          }
        ?>
        <tr class="edit">
          <form action="inst_cr.php" method="POST">
          <td>
            <input type="hidden" name="def" value=<?php echo $def; ?> >
            <select name="type">
              <option value="Causes">Causes</option>
              <option value="Remedies">Remedies</option>
            </select>
          </td>
          <td>
            <textarea name="detail"></textarea>
          </td>
          <td>
            <button class="btn btn-primary" type="submit" ><i class="icon-ok icon-white"></i> Save</button>
          </td>
          </form>
        </tr>
      </tbody>
    </table>
    <br>
    <a href="defect_list.php" class="btn">
      <i class="icon-hand-left"></i> Back
    </a>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>