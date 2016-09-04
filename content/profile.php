<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
//	require_once('../include/functions/profile_fns.php');

	if(!isLoggedIn())
	{
		mysqli_close($con);
		header("Location: ../extras/log_in.php");
		exit();
	}

		$u_id = $_SESSION['u_id'];		
		if(isset($_POST['save_button']) && !empty($_POST['save_button']) && $_POST['save_button'] == "Save" )
		{
			if(!empty($_POST['u_name'])&&!empty($_POST['company_name'])&& !empty($_POST['phone_no']) && !empty($_POST['address'])
				&&!empty($_POST['about_me']))
			{
				$u_name =sanitize($con,$_POST['u_name']);
				$company_name =sanitize($con,$_POST['company_name']);
				$phone =sanitize($con,$_POST['phone_no']);
				$about_me =sanitize($con,$_POST['about_me']);
				$address =sanitize($con,$_POST['address']);

				$query = "UPDATE tbl_user SET u_name = '".$u_name."' , company_name = '".$company_name."' ,
				phone = '".$phone."' , about_me = '".$about_me."' , address = '".$address."' WHERE u_id = ".$u_id;

				$result = mysqli_query($con,$query) or die(mysqli_error($con));

				if($result){
					$error_msgs[]="Your profile updated successfully...";
				}else{
					echo 'error...';
				}
			}else{
				$error_msgs[]="Enter all FIELDS!!!";
			}
		}


		$query = "SELECT u_name,email,company_name,phone,about_me,address FROM tbl_user where u_id=".$u_id;
		$result = mysqli_query($con,$query);

		$row = mysqli_fetch_assoc($result);
		$u_name = $row['u_name'];
		$email = $row['email'];
		$company_name = $row['company_name'];
		$phone = $row['phone'];
		$about_me = $row['about_me'];
		$address = $row['address'];
?>
	<title>My Profile</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
<div id="banner_footer">
	<p><?php echo ucfirst($_SESSION['u_type']); ?>'s Profile</p>
</div>
<div class="wrapper">
	<div id="my_profile">

		<?php
			require_once('../entities/dashboard.php');
		?>
		<div id="profile_div">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="profile">
				<h1>My Profile</h1>
				<?php displayErrors($error_msgs); ?>
				<div id="username_div">
					<label for="username">Username:</label><br>
					<input name="u_name" type="text" id="username" value = "<?php echo $u_name;?>">
				</div>
				<div id="email_div">
					<label for="email">Email:</label><br>
					<input name="email" type="text" id="email" disabled value = "<?php echo $email;?>">
				</div>
				<div id="company_div">
					<label for="company">Company Name:</label><br>
					<input name="company_name" type="text" id="company_pro" value = "<?php echo $company_name;?>">
				</div>
				<div id="phone_no_div">
					<label for="phone_no">Phone:</label><br>
					<input name="phone_no" type="text" id="phone_no" value = "<?php echo '('.substr($phone,0,3).') '.substr($phone,3);?>">
				</div>
				<div id="about_me_div">
					<label for="about_me">About Me:</label><br>
					<textarea name="about_me" id="about_me"><?php echo $about_me;?></textarea>
				</div>
				<div id="address_div">
					<label for="address">Address:</label><br>
					<textarea name="address" id="address"><?php echo $address;?></textarea>
				</div>
				<button type="submit" name="save_button" value="Save" id="save_button">Save</button>
			</form>
			<!--<input type="submit" value="Save" id="save_button" />-->
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
