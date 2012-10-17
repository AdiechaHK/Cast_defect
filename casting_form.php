<html>
<head>
<title> Admin Pannel </title>
<?php include 'head.php'; ?>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container" id="bodyContent">
    <form class="form-horizontal" action="save_casting.php" method="POST" enctype="multipart/form-data">
      <legend><?php echo $title; ?></legend>
      <input type="hidden" name="id" value=<?php echo $casting['id']; ?> >
      <div class="control-group">
        <label class="control-label" for="title">Title</label>
        <div class="controls">
          <input type="text" id="title" value=<?php echo $casting['title']; ?> >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="desc">Description</label>
        <div class="controls">
          <textarea name="desc" id="desc"><?php echo $casting['description']; ?> </textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="file">Image</label>
        <div class="controls">
          <input type="file" id="file" name="file">
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Casting</button>
        <a class="btn" href="adminPanel.php">Cancel</a>
      </div>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>