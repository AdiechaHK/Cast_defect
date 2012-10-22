<?php
	session_start(); 
	$def = $_GET['id'];
?>
<html>
<head>
  <title>Test</title>
  <?php include 'head.php'; ?>
</head>
<body>
<!-- Header -->
<?php include 'header.php'; ?>
<!-- body -->
<div class="container" id="bodyContent">
	<?php
	include 'dbconfig.php';
	$query = 'select title, description from defects where id="'.$def.'";';
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 1){
		$row = mysql_fetch_array($result);
		$title = $row['title'];
		$description = $row['description'];
	?>
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
	<div class="row">
		<div class="span8">
		<?php echo $description; ?>
		</div>
		<div class="span4">
			<?php
				$query = 'select image from image where defect="'.$def.'";';
				$result = mysql_query($query);
				if(mysql_num_rows($result)>0) {
					list($image) = mysql_fetch_array($result);
					?> <img alt="No image" class="pull-right" src=<?php echo $image; ?> > <?php
				} 
			?>
		</div>
	</div>
	<div class="page-header"><h2>Parameters</h2></div>
		<?php 
		$query = 'select param, block from def_param where defect="'.$def.'";';
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			echo "<ul>";
			while($row = mysql_fetch_array($result)) {
				echo "<li><strong>".$row['param'].": </strong>".$row['block']."</li>";
			}
			echo "</ul>";
		} else {
			echo "No Result Found";
		}
		?>
	<div class="page-header"><h2>Causes and Remedies</h2></div>
	<div>
		<h3>Causes :</h3>
		<?php 
		$query = 'select block from cos_rem where defect="'.$def.'" and type="Causes";';
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			echo "<ul>";
			while($row = mysql_fetch_array($result)) {
				echo "<li>".$row['block']."</li>";
			}
			echo "</ul>";
		} else {
			echo "No Result Found";
		}
		?>

		<h3>Remedies :</h3>
		<?php 
		$query = 'select block from cos_rem where defect="'.$def.'" and type="Remedies";';
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			echo "<ul>";
			while($row = mysql_fetch_array($result)) {
				echo "<li>".$row['block']."</li>";
			}
			echo "</ul>";
		} else {
			echo "No Result Found";
		}
		?>

	</div>
	<?php } else {
		echo "<h1> NO DETAILS AVAILABLE . . . </h1>";
	} ?><br>
    <a href="defects.php" class="btn"><i class="icon-hand-left"></i>  Back</a> &nbsp;
</div>
<!-- Footer -->
<?php 
include 'footer.php'; 
?>
</body>
</html>