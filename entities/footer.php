<?php

	$email = '';

	if(isset($_POST['subscribe_btn']) && !empty($_POST['subscribe_btn']) &&  $_POST['subscribe_btn']==='Subscribe')
	{
		$email = sanitize($con,$_POST['email']);

		if(isset($email) && !empty($email))
		{

			//Email validation

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				$err_msg = "$email is not a valid email address";
				$error_msgs[]= $err_msg;
				$form = true;
				$email = "";
			}

			//After Email validation insertion into database

			if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				 $query = "insert into tbl_subscription (su_email) values ('$email') ";
				 $result = mysqli_query($con,$query) or die(mysqli_error($con));
			}
		}
		else
		{
			$e_msg = 'Please enter your email address.';
			$error_msgs[]=$e_msg;
			$email='';
		}

	}

?>

<div id="footer">
	<div class="wrapper">
		<div id="footer_content">
			<div id="link">
				<h3>Links</h3>
				<ul>
					<li><a title="Home" href="<?php echo $siteroot; ?>/extras/home.php" title="">Home</a></li>
					<li><a title="About-Us" href="<?php echo $siteroot; ?>/extras/about_us.php" title="">About us</a></li>
					<li><a title="FAQs" href="<?php echo $siteroot; ?>/extras/faq.php" title="">FAQ's</a></li>
					<li><a title="Sitemap" href="<?php echo $siteroot; ?>/extras/sitemap.php" >Sitemap</a></li>
					<li><a title="Privacy Policy" href="<?php echo $siteroot; ?>/extras/privacy_policy.php" title="PrivacyPolicy">Privacy Policy</a></li>
					<li><a title="Contact-Us" href="<?php echo $siteroot; ?>/extras/contact_us.php" title="">Contact us</a></li>
					<?php
					if(isLoggedIn()){
					 ?>
						<li><a href="#" title="My Account">My Account</a></li>
						<li><a title="Log Out" href="<?php echo $siteroot; ?>/extras/log_out.php" title="">Log Out</a></li>
					<?php
					}else{
					 ?>
						<li><a title="Sign-Up" href="<?php echo $siteroot; ?>/extras/log_in.php" title="">Registration</a></li>
						<li><a title="Log In" href="<?php echo $siteroot; ?>/extras/log_in.php" title="">Login</a></li>
					<?php
					}
					 ?>
				</ul>
			</div>
			<div id="newsletter">
				<h3>Newsletter</h3>
				<?php foreach($error_msgs as $error_msg) echo "<p id='error_msg_newsletter'>".$error_msg."</p>" ?>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<label for="email_text">Sign Up for Our Newsletter:</label>
					<input type="email" id="email_text" name="email" placeholder="Enter your email here">
					<input type="submit" title="Subscribe Our Newsletter" name="subscribe_btn" id="button" value="Subscribe">
				</form>
			</div>

			<div id="social">
				<h3>Get Socials</h3>
				<ul>
					<li><a href="https://www.facebook.com/" title="Like us on Facebook"><img src="<?php echo $siteroot; ?>/images/fb_icon.png" alt="facebook" title="Like us on Facebook"></a></li>
					<li><a href="https://twitter.com/" title=""><img src="<?php echo $siteroot; ?>/images/twitter_icon.png" alt="twitter" title="Follow us on Twitter"></a></li>
					<li><a href="https://plus.google.com/" title=""><img src="<?php echo $siteroot; ?>/images/google_icon.png" alt="google+" title="Connect us on Google+"></a></li>
					<li><a href="https://www.linkedin.com/" title=""><img src="<?php echo $siteroot; ?>/images/linkdn_icon.png" alt="linkedIn" title="Connect us on LinkedIn"></a></li>
					<li><a href="https://www.pinterest.com/" title=""><img src="<?php echo $siteroot; ?>/images/pinterest_icon.png" alt="pinterest" title="Connect us on Pinterest"></a></li>
				</ul>
			</div>

		</div>


		<div class="clear"></div>
	</div>
	<div id="copy"><p>&copy; Copyright 2014<a href="<?php echo $siteroot; ?>/extras/home.php" title=""> <span id="company">Washers</span></a>. All Rights Reserved</p></div>
</div>

<script src="<?php echo $siteroot; ?>/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo $siteroot; ?>/js/jquery-ui.js"></script>
<?php
@mysqli_close($con);
?>