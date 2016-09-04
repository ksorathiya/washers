<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/about_us_fns.php');
?>
	<title>Privacy Policy</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
	
	$id = 1;
	
	$query = "select ol_privacypolicy from tbl_onlinelaundry where ol_id=".$id;
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	
	$row = mysqli_fetch_assoc($result);
?>
	<div id="banner_footer">
		<p>Privacy Policy</p>
	</div>

	<div class="main">
		<div class="wrapper">
			<?php echo $row['ol_privacypolicy']?>
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
?>
