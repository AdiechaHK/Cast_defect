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
                $sidebar = array('casting' => "active", 'defects' => "");
                include 'sidebar.php' 
            ?>
            <div class="span9"> <!-- main page -->

              <div class="well">

                <h2>List of casting types</h2>

                <div class="row-fluid">

                  <a href="new_casting.php" class="btn btn-primary">

                    <i class="icon-plus icon-white"></i> Add Casting

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

                    $query = 'select id, title from casting;';

                    $result = mysql_query($query);

                    if(mysql_num_rows($result)>0){
                      while($row = mysql_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td>";
                        echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn btn-info\">Edit</a> &nbsp";
                        echo "<a href=\"delete_casting.php?id=".$row['id']."\" class=\"btn btn-danger\">Delete</a>";
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