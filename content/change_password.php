<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/change_pass_fns.php');

	if(!isLoggedIn()){
		mysqli_close($con);
		header("Location: ../extras/log_in.php");
		exit();
	}

	if(isset($_POST['save_button']) && !empty($_POST['save_button']) && $_POST['save_button']==='Save'){
	
		$old_pass = md5(sanitize($con,$_POST['old_pass']));
		$new_pass = md5(sanitize($con,$_POST['new_pass']));
		$conf_pass = md5(sanitize($con,$_POST['conf_pass']));
		
		$u_id=$_SESSION['u_id'];
		$query = "SELECT u_id FROM tbl_user WHERE password='".$old_pass."' and u_id = '".$u_id."'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		
		if(mysqli_num_rows($result) == 1 )
		{	
			if($new_pass === $conf_pass){
				$query = "UPDATE tbl_user SET password ='".$new_pass."' WHERE u_id = '".$u_id."'";
				mysqli_query($con,$query) or die(mysqli_error($con));
				mysqli_close($con);
				header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/log_in.php?c_p");
				exit();
			}else{
				$error_msgs[]="New Password and Confirm Password must same.";
			}
		}else{
			$error_msgs[]="Wrong Password!!!";
		}
	}
?>
	<title>Change Password</title>
<?php			
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
<div id="banner_footer">
	<p>Change Password</p>
</div>
<div class="wrapper">
	<div id="change_password">
		<?php
			require_once('../entities/dashboard.php');
		?> 
		<div id="change_password_div">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<div id="change_password_form">
				<h1>Change Password</h1>
				<?php displayErrors($error_msgs);?>
				<div id="old_pass_div">
					<label for="old_pass">Old Password</label><br>
					<input type="password" id="old_pass" name="old_pass">
				</div>
				<div id="new_pass_div">
					<label for="new_pass">New Password</label><br>
					<input type="password" id="new_pass" name="new_pass">
				</div>
				<div id="conf_pass_div">
					<label for="conf_pass">Confirm Password</label><br>
					<input type="password" id="conf_pass" name="conf_pass">
				</div>
				<div class="clear"></div>
				</div>
			<input name="save_button" type="submit" value="Save" id="save_button">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
	require_once('../entities/footer.php');
?>
<script>
</script>
</body>
</html>