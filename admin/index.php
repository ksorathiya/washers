<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	require_once('../include/functions/login_fns.php');

	if(isAdminLoggedIn()){
		header("Location: register_admin.php");
		exit();
	} else {
		header("Location: login.php");
		exit();
	}
 ?>
