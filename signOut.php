<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	unset($_SESSION['isAdmin']);
	unset($_SESSION['user_name']);
	echo "{ \"error\": false, \"content\": \"<li><a href='#myModal' data-toggle='modal'>Sign In</a></li>\"}";
}
?>