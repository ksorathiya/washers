<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/faq_fns.php');

?>
	<title>FAQ's</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
?>
	<div class="banner_wrapper">
<?php
	require_once('../entities/banner.php');

	$null = '';
	$query = "select  * from tbl_faqs where f_ans !='.$null.' ";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
?>
	</div>
	<div id="banner_footer">
		<p>FAQ's</p>
	</div>
	<div class="wrapper">
		<div id="accordion">

			<?php
				while($row = mysqli_fetch_assoc($result))
				{	?>

				<h3><img src="../images/FAQ_Q.jpg"><?php echo $row['f_ques']?></h3>
					<div>
						<p><span><?php echo $row['f_ans']?></span></p>
					</div>

			<?php
				}
			?>




		</div>
	</div>

<?php
	require_once('../entities/footer.php');
?>
<script>
	$(function() {
		$( "#accordion" ).accordion();
	});
</script>
</body>
</html>
