<html>
<head>
<title> Admin Pannel </title>
<?php include 'head.php'; ?>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container" id="bodyContent">
        <div class="row-fluid">
            <div class="span3"> <!-- side bar -->
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                  <li class="nav-header">Admin</li>
                  <li class="active"><a href="#">Types of Casting</a></li>
                  <li><a href="defect_list.php">Types of defects</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
            </div>
            </div>
            <div class="span9"> <!-- main page -->
              <div class="well">
                <h2>List of casting types</h2>
                <div class="row-fluid">
                  <a href="new_casting.php" class="btn btn-info">
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
                    while($row = mysql_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>".$row['title']."</td>";
                      echo "<td>";
                      echo "<a href=\"edit_casting.php?id=".$row['id']."\" class=\"btn\">Edit</a> &nbsp";
                      echo "<a href=\"delete_casting.php?id=".$row['id']."\" class=\"btn btn-danger\">Delete</a>";
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