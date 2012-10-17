<?php
	session_start();
	if(!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true)) {
		header("location: index.php");
	}

?>