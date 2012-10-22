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
                $sidebar = array('casting' => "", 'defects' => "active", 'param'=>"");
                include 'sidebar.php' 
            ?>
            <div class="span9"> <!-- main page -->

              <div class="well">

                <h2>List of Defects</h2>

                <div class="row-fluid">

                  <a href="new_defect.php" class="btn btn-primary">

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

                    if(mysql_num_rows($result)>0){
                      while($row = mysql_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td>";
                        echo "<a href=\"edit_defect.php?id=".$row['id']."\" class=\"btn btn-info\">Edit</a> &nbsp";
                        echo "<a href=\"modify_image.php?id=".$row['id']."\" class=\"btn\">Change Image</a> &nbsp";
                        echo "<a href=\"modify_param.php?id=".$row['id']."\" class=\"btn\">Change Parameter</a> &nbsp";
                        echo "<a href=\"modify_cr.php?id=".$row['id']."\" class=\"btn\">Change Causes&Remedies</a> &nbsp";
                        echo "<a href=\"delete_defect.php?id=".$row['id']."\" class=\"btn btn-danger\">Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan=\"2\"> No record to display </td></tr>";
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