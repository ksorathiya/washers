<?php
require_once('../include/init.php');
require_once('../include/functions/general_fns.php');
?><!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<title>Washers</title>
<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	margin: 0px;
	padding: 0px;
}
.wd {
	margin: 0 auto;
	width: 400px;
	background: #f2f2f2;
	border: 1px solid #ccc;
	padding: 15px;
}
.wd ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.wd ul li {
	margin: 12px 0px;
}
.wd ul li span {
	font-size: 15px;
}
.wd ul li a {
	color: #333;
	text-decoration: none;
	text-transform: capitalize;
}
.wd ul li a:hover {
	color: #bc4146;
}
.logo {
	background: url(<?php echo $siteroot; ?>/images/logo.png) no-repeat center top;
	height: 140px;
	margin: 0 auto;
	width: 300px;
}


.wd h1 {
	font-size: 25px;
	text-transform: capitalize;
	margin-bottom: 15px;
}
.content{
	margin-left:20px;
}
</style>
</head>

<body>
<br />
<br />
<div class="logo"></div>
<div class="wd">

	<div class="content">
  <h1>Site Map</h1>
  <ul>
    <li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/extras/home.php">Home</a></li>
    <li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/extras/about_us.php">About Us</a></li>
    <li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/extras/contact_us.php">contact us</a></li>
    <li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/extras/faq.php">Faq's</a></li>
		<?php
			if(!isLoggedIn())
			{
		?>
		<li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/extras/log_in.php">Login</a></li>
		<li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/content/register.php?u_type=customer">Register Customers</a></li>
		<li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/content/register.php?u_type=driver">Register Driver</a></li>
		<li><span>»</span> <a target="_blank" href="<?php echo $siteroot; ?>/content/register.php?u_type=vendor">Register Laundry</a></li>
		<?php
			}
		 ?>

  </ul>
</div>
</div>
<br />
<br />
<br />
<br />
</body>
</php>
