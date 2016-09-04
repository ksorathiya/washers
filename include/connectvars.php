<?php
//DATABASE connection
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB','wow_db');

	$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB)
				or die("ERROR WHILE CONNECTING");
?>
