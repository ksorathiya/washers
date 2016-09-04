<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/about_us_fns.php');
?>
	<title>About Washers</title>
	<?php include_once('../entities/icon_title_bar.html');?>
<?php
	require_once('../entities/header.php');
?>
	<div  class="banner_wrapper">
<?php	
	require_once('../entities/banner.php');
	
	$id = 1;
	
	$query = "select au_text,au_image from tbl_aboutUs where au_id=".$id;
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	
	$row = mysqli_fetch_assoc($result);
?>
	</div>
	<div id="banner_footer">
		<p>About-Us</p>
	</div>

	<div class="main">
		<div class="wrapper">

			<p><?php echo $row['au_text']?></p>
			<!--<img src="../<?php echo $row['au_image']?>" id="about_us_image" alt="about us image" title="About Us">-->
			
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
	mysqli_close($con);
?>
