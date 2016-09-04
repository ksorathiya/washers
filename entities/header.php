<?php
	@session_start();
?>

<!doctype html public>
<html>
<head>
	<title><?php echo $_SESSION['title']; ?></title>
	<!--Title Tab ICON-->
	<link rel="shortcut icon" href="../images/logo.ico/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="57x57" href="logo.ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--Title Tab ICON-->
	<link href="<?php echo $siteroot; ?>/css/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo $siteroot; ?>/css/magnific-popup.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $siteroot; ?>/css/index.css" type="text/css" rel="stylesheet">
</head>

<body>
<div id="header">
		<div class="wrapper">
			<div id="header_content" >
				<ul id="contacts">
					<?php
						$id = 1;
						$query = "select ol_office,ol_email from tbl_onlinelaundry where ol_id=".$id;
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						$row = mysqli_fetch_assoc($result);
					?>
					<li id="phone" title="Call Us"><?php echo '('.substr($row['ol_office'],0,3).') '.substr($row['ol_office'],3)?></li>
					<li id="email_c"><a title="Email Us" href="<?php echo $siteroot; ?>/extras/contact_us.php"><?php echo $row['ol_email']?></a></li>
				</ul>
				<div class="clear"></div>
				<ul id="navigation_bar">
					<li><a title="Home" href="<?php echo $siteroot; ?>/extras/home.php" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/home.php") echo "class=\"active\"";?>>
							HOME</a></li>
					<li class="separator">|</li>
					<li><a title="About-Us" href="<?php echo $siteroot; ?>/extras/about_us.php" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/about_us.php") echo "class=\"active\"";?>>
							ABOUT US</a></li>
					<li class="separator">|</li>
					<li><a title="FAQs" href="<?php echo $siteroot; ?>/extras/faq.php" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/faq.php") echo "class=\"active\"";?>>
							FAQ'S</a></li>
					<li class="separator">|</li>
					<li><a title="Contact-Us" href="<?php echo $siteroot; ?>/extras/contact_us.php" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/contact_us.php") echo "class=\"active\"";?>>
							CONTACT US</a></li>
					<li class="separator">|</li>

					<?php
					if(isLoggedIn()){
					 ?>
					 	<li><a title="My Account" href="<?php echo $siteroot.'/content/profile.php'; ?>" <?php if(dirname($_SERVER['PHP_SELF'])=="/washers/content") echo "class=\"active\"";?>>
								MY ACCOUNT</a></li>
						<li class="separator">|</li>
						<li><a title="Log Out" href="<?php echo $siteroot; ?>/extras/log_out.php" <?php if(dirname($_SERVER['PHP_SELF'])=="/washers/content") ?>>
								LOG OUT</a></li>
					<?php
					}else{
					 ?>
					 	<li><a title="Login" href="<?php echo $siteroot; ?>/extras/log_in.php" <?php if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/log_in.php") echo "class=\"active\"";?>>
								LOGIN</a></li>
					 <?php
					 }

					 if($_SERVER['PHP_SELF']==dirname($_SERVER['PHP_SELF'])."/home.php")
					 {
					  ?>
						<li id="order_now_button"><a href="#our_category">Order Now</a></li>
					<?php
					}else{
				  	?>
						<li id="order_now_button"><a href="<?php echo $siteroot; ?>/extras/home.php#our_category">Order Now</a></li>
					<?php
					}
					  ?>


				</ul>

			</div>
			<div id="header_image">
				<a href="<?php echo $siteroot; ?>/extras/home.php"><img src="<?php echo $siteroot; ?>/images/logo1.png" alt="site logo" title="washers logo"></a>
			</div>
		</div>
</div>
