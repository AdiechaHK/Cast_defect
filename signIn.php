<?php
	session_start();

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	include 'dbconfig.php';

	$query = "select `password`, `name` from `user` where `email`=\"".$email."\"";
	// echo $query;
	$result = mysql_query($query);

	$count = mysql_num_rows($result);

	if($count == 1) {
		// Check password
		$row = mysql_fetch_array($result);
		if($password == $row['password']) {
			// result for success full sign in
			$_SESSION['user_name'] = $row['name'];
			$_SESSION['isAdmin'] = true;
			echo "{ \"error\": false, \"content\": \"<li><a href='adminPanel.php'>Admin Pannel</a></li><li class='divider-vertical'></li><li><a href='#' id='signOut'>Sign Out</a></li>\"}";
		} else {
			// wrong password
			echo "{ \"error\": true, \"content\": \"Incorrect Password.\"}";
		}
	} else if($count > 1) {
			echo "{ \"error\": true, \"content\": \"Conflicts in accouts, contect to your site admin.\"}";
	} else {
			echo "{ \"error\": true, \"content\": \"Account not found.\"}";
	}

	// echo $email." : ".$password;
?>