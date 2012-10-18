<html>

<head>

<title> Admin Pannel </title>

<?php include 'head.php'; ?>

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container" id="bodyContent">

        <div class="row-fluid">

            <?php
                $sidebar = array('casting' => "", 'defects' => "active");
                include 'sidebar.php' 
            ?>
            <div class="span9"> <!-- main page -->

              <div class="well">

                <h2>List of Defects</h2>

                <div class="row-fluid">

                  <a href="new_defect.php" class="btn btn-info">

                    <i class="icon-plus icon-white"></i> Add Defect

                  </a>

                </div><br>

                <table class="table">

                  <thead>

                    <tr>
  
                    <th>Title</th>

                      <th>Actions</th>

                    </tr>

                  </thead>

                  <tbody>

                  <?php
 
                   include 'dbconfig.php';

                    $query = 'select id, title, image, parameter, causesAndRemedies from defects;';

                    $result = mysql_query($query);

                    while($row = mysql_fetch_array($result)) {

                      echo "<tr>";

                      echo "<td>".$row['title']."</td>";

                      echo "<td>";

                      echo "<a href=\"edit_defect.php?id=".$row['id']."\" class=\"btn\">Edit</a> &nbsp";

                      if($row['image']) echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Change Image</a> &nbsp";

                      else echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Add Image</a> &nbsp";

                      if($row['parameter']) echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Change Parameter</a> &nbsp";

                      else echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Add Parameter</a> &nbsp";

                      if($row['causesAndRemedies']) echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Change C&R</a> &nbsp";

                      else echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Add C&R</a> &nbsp";

                      echo "<a href=\"delete_defect.php?id=".$row['id']."\" class=\"btn btn-danger\">Delete</a>";

                      echo "</td>";

                      echo "</tr>";

                    }

                  ?>

                  </tbody>

                </table>

              </div>

            </div>

        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>