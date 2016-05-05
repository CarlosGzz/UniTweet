<?php
	$servername = "sehur.me";
	$username = "root";
	$password = "V239ecoif";
	$dbname = "unitweet";
	echo "hola";
	// Create connection
	$db = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($db->connect_error) {
		die("Connección fallida: Lo sentimos estamos teniendo problemas" . $db->connect_error);
	}

	echo " hokk";
?>