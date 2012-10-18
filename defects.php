<?php include 'adminVerify.php'; ?>
<html>
<head>
<title> Admin Pannel </title>
<?php include 'head.php'; ?>
<script src="./public/js/param.js"></script>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container" id="bodyContent">
    <h2>List of Defects</h2>
    <br>
    <table class="table" id="tbl-param">
      <thead>
        <tr>
          <th>Title</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'dbconfig.php';
          $def = $_GET['id'];
          $query = 'select id, title, parameter, image, causesAndRemedies from defects;';
          $result = mysql_query($query);
          while(list($id, $title, $parameter, $image, $causesAndRemedies) = mysql_fetch_array($result)) {
            ?>
            <tr>
              <td>
                <?php 
                  echo $title;
                  if($parameter || $image || $causesAndRemedies) {
                    ?>
                    <a href=<?php echo "details.php?id=".$id; ?> class="btn pull-right">Details</a>
                    <?php
                  }
                ?>
              </td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>