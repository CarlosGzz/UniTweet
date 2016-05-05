<?php
	$servername = "us-cdbr-iron-east-03.cleardb.net";
  	$username = "bd6ae5abdbbdd1";
  	$password = "3fc8f834";
  	$dbname = "heroku_9591bc77f0cc5ca";
	// Create connection
	$db = new mysqli($servername, $username, $password, $dbname);
	mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if ($db->connect_error) {
		die("Connección fallida: Lo sentimos estamos teniendo problemas " . $db->connect_error);
	}
?>