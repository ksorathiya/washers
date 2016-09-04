<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');

	if($_POST['payment_status']=="Completed"){
		$query="INSERT INTO tbl_bucket(cl_id,qty) VALUES";
		$clothes=implode(',',array_keys($_SESSION['bucket']));

		$quantities=implode(',',$_SESSION['bucket']);

		$query="INSERT INTO tbl_order(cu_id,ve_id,c_id,clothes,quantities,transac_id,amount,date_time) VALUES({$_SESSION['u_id']},{$_POST['item_number']},{$_SESSION['c_id']},'$clothes','$quantities','{$_POST['txn_id']}',{$_POST['mc_gross']},now())";

		mysqli_query($con,$query) or die(mysqli_error($con));

		unset($_SESSION['bucket']);
		unset($_SESSION['c_id']);

	}
?>
	<title>Payment Successful</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
	<div id="banner_footer">
		<p>Payment Successful</p>
	</div>
	<div class="wrapper">
	<div id="payment">
		<h1>THANK YOU FOR YOUR PAYMENT</h1>
		<p>
			Your transaction id is <br><strong><?php echo $_POST['txn_id']?></strong><br>
			<span id="one"> one of our representative will contact you soon </span><br>
			<img src="../images/logo.png" alt="logo">
		</p>
	</div>
	<div class="clear"></div>
	</div>

<?php
	require_once('../entities/footer.php');
?>

<?php
//}
	//else
//	{
	//	header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/log_in.php");
	//}
?>
