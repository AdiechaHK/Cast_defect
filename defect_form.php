<html>

<head>

<title> Admin Pannel </title>

<?php include 'head.php'; ?>

</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container" id="bodyContent">

    <form class="form-horizontal" action="save_defect.php" method="POST">

      <legend><?php echo $title; ?></legend>

      <input type="hidden" name="id" value=<?php echo $defect['id']; ?> >

      <div class="control-group">

        <label class="control-label" for="title">Title</label>

        <div class="controls">

          <input type="text" name="title" id="title" value=<?php echo $defect['title']; ?> >

        </div>

      </div>

      <div class="control-group">

        <label class="control-label" for="desc">Description</label>

        <div class="controls">

          <textarea name="description" id="desc"><?php echo $defect['description']; ?> </textarea>

        </div>

      </div>

      <div class="form-actions">

        <button type="submit" class="btn btn-primary">Save Defect</button>

        <a class="btn" href="defect_list.php">Cancel</a>

      </div>

    </form>

  </div>

  <?php include 'footer.php'; ?>

</body>

</html>