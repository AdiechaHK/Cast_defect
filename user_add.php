<?php
if($_POST['adminPass']=="titanic") {
	include 'dbconfig.php';
	$name = $_POST['userName'];
	$email = $_POST['userEmail'];
	$pass = md5($_POST['userPass']);
	$query = "insert into `user` (`name`, `email`, `password`) values (\"".$name."\", \"".$email."\", \"".$pass."\")";
	echo $query;
	mysql_query($query);
	echo "DONE";
} else {
	echo "Incorrect admin-password";
}
?>