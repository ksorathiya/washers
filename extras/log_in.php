<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	require_once('../include/functions/login_fns.php');

	if(isLoggedIn())
	{
		mysqli_close($con);
		header("Location: home.php");
		exit();
	}

	$email='';
	$phone="";
	$errors=array();
	$output_form=true;
	if(isset($_POST['SUBMIT']))
	{
		$email=sanitize($con,$_POST['email']);
		$password=md5(sanitize($con,$_POST['password']));

		if(!empty($email)&&!empty($password))
		{
			$query="SELECT u_id, u_type FROM tbl_user WHERE email='".$email."' and password='".$password."'";
			$result=mysqli_query($con,$query) or die(mysqli_error($con));

			if(mysqli_num_rows($result)!=1){
				$error_msgs[]="Invalid Username of Password";
			}else{
				$row = mysqli_fetch_assoc($result);
				login($row);
				mysqli_close($con);
				header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php");
				exit;

			}
		}else{
			$error_msgs[]="Enter All FIELDS!!!";
		}
	}

	if(isset($_POST['forgot_pass_submit']) && !empty($_POST['forgot_pass_submit']))
		{

			if(!empty($_POST['email']) || !empty($_POST['phone']))
			{
				$output_form=false;
				require_once('../connectvars.php');
				if(!empty($_POST['email']))
					$contact=mysqli_real_escape_string($con,trim($_POST['email']));
				if(!empty($_POST['phone']))
					$contact=mysqli_real_escape_string($con,trim($_POST['phone']));

				$query="SELECT u_id FROM tbl_user WHERE (phone='".$contact."' or email='".$contact."') ";
				$result=mysqli_query($con,$query) or die(mysqli_error($con));

				if(mysqli_num_rows($result)==0)
				{
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/forget_identify.php?no");
				}else{
					$row=mysqli_fetch_array($result);
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/forget_identify.php?u_id=".$row['u_id']);
				}

			}else{
				array_push($errors,"Enter at least one contact.");
				unset($email,$phone);
			}

		}
		if($output_form==true)
		{
	require_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
	<div id="banner_footer">
		<p>Log In</p>
	</div>
	<div id="main">
		<div class="wrapper">
			<div id="login">
				<h1>Log In</h1>
				<?php displayErrors($error_msgs); ?>
				<?php
					if(isset($_GET['reg']))
						echo "<p class=\"error_msg\">You are registered, now LOG-IN using you're credentials!!!</p>";
					if(isset($_GET['c_p']))
						echo "<p class=\"error_msg\">Password changed successfully!!!</p>";
				?>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name="log_in">
						<label for="email">Email:</label><br>
						<input type="text" id="email" name="email"><br>
						<label for="password">Password:</label><br>
						<input type="password" id="password" name="password"><br>
						<input type="submit" value="Login" id="login_button" name="SUBMIT">
						
							<span class="popup forgetdiv" id="forget"><a href="" title="Don't worry,we are here to help you.">Forgot Password?</a></span>
						
						<div class="clear"></div>
				</form>
				
			</div>
			<div id="registration">
				<h1>Registration</h1>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet.</p>
				<ul>
					<a href="../content/register.php?u_type=customer"><li>Register as a Customer</li></a>
					<a href="../content/register.php?u_type=vendor"><li>Register as a Vendor</li></a>
					<a href="../content/register.php?u_type=driver"><li>Register as a Driver</li></a>
				</ul>
			</div>
			<div class="clear"></div>	
			<div id="popup-window" class="white-popup mfp-hide">
				<h2>Forgot Login </h2>
				<img id="forgot_img" src="../images/logo.png" title="washers">
				<div class="popup-content">
					<p class="highlight"><?php foreach($errors as $error) echo $error;?></p>
						<form id="forgot_pass_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
							<input type="text" name="email" placeholder="Email ID" <?php if(!isset($email)) echo "class=\"invalid_input\"";?>>
							<br/>
							<strong>OR</strong>
							<br/>
							<input type="text" name="phone" placeholder="Phone No." <?php if(!isset($phone)) echo "class=\"invalid_input\"";?>>
							<br/>
							<button class="button" type="submit" id="forgot_pass_submit_btn" name="forgot_pass_submit" >Recover Account </button>
						</form>
				</div>
			</div>
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
		}
?>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function(){
	
	var popup=$('.popup').magnificPopup({
	  items: {
		  src: '#popup-window',
		  type: 'inline',
	  },
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	$('.popup').click(function(){
		var c_id = $(this).attr("id");

		

		});
	});
	

</script>
</body>
</html>
