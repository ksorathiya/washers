<?php
	session_start();
	if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
	{
?>

<!doctype html public>
<html>
<head>
	<title>My Income</title>
	<link href="css/index.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('sections/header.html');
	require_once('sections/banner.html');
?>
	<div id="banner_footer">
		<p>Driver Profile</p>
	</div>
	<div class="wrapper">
	<div id="my_income">
		<?php
			require_once('sections/dashboard.html');
		?>
		<div id="my_income_div">
			<div id="income">
				<h1>My Income</h1>
				<label>Name: <span id="user_name">john smith</span></label><br>
				<label>Income: </label><div id="income_no">500 INR</div>
			</div>
		</div>

		<div class="clear"></div>
	</div>
	</div>

<?php
	require_once('sections/footer.html');
?>
</body>
</html>

<?php
}
	else
	{
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/log_in.php");
	}
?>
