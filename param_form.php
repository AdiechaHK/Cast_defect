<html>

<head>

<title> Admin Pannel </title>

<?php include 'head.php'; ?>

</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container" id="bodyContent">

    <form class="form-horizontal" action="save_param.php" method="POST" enctype="multipart/form-data">

      <legend><?php echo $title; ?></legend>
      <input type="hidden" name="id" value=<?php echo $param['id']; ?> >
      <div class="control-group">
        <label class="control-label" for="title">Title</label>
        <div class="controls">
          <input type="text" name="title" id="title" value=<?php echo $param['title']; ?> >
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Casting</button>
        <a class="btn" href="param_list.php">Cancel</a>
      </div>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>