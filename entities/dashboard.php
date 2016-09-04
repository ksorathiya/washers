<div id="dashboard">
	<h1>Dashboard</h1>
	<ul>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png">
				<a href="<?php echo $siteroot.'/content/profile.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/profile.php") echo "class=\"active\"";?> title="My Profile">
					My Profile</a></li>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/content/change_password.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/change_password.php") echo "class=\"active\"";?> title="Change Password">
					Change Password</a></li>
		<?php
			if($_SESSION['u_type']=='vendor')
			{
		?>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/content/change_prices.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/change_prices.php") echo "class=\"active\"";?> title="Change Prices">
					Change Prices</a></li>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/content/new_order.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/new_order.php" || $_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/new_order_view_details.php") echo "class=\"active\"";?> title="New Order">
					New Orders</a></li>
		<?php
			}
		?>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/content/my_order.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/my_order.php" || $_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/my_order_view_details.php") echo "class=\"active\"";?> title="My Order">
					My Orders</a></li>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/content/my_payment.php'?>" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/my_payment.php" || $_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/my_payment_view_details.php") echo "class=\"active\"";?> title="My Payment">
					My Payment</a></li>
		<li><img src="<?php echo $siteroot; ?>/images/deskboard_arrow.png"><a href="<?php echo $siteroot.'/extras/log_out.php'?>" title="Log Out">
					Log Out</a></li>
	</ul>
</div>
