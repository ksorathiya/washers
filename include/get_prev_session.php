<?php
//Get Previous Sessions if EXISTS
	if(!isset($_SESSION['u_id'])){
		if(isset($_COOKIE['u_id']) && isset($_COOKIE['u_type'])) {
	      $_SESSION['u_id'] = $_COOKIE['u_id'];
	      $_SESSION['u_type'] = $_COOKIE['u_type'];
	    }
	}
?>
