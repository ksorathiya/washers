<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	require_once('../include/functions/home_fns.php');

?>
	<title>Select Seller</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
	<div id="banner_footer">
		<p>Select Sellers</p>
	</div>
	<div class="wrapper">
	<div id="select_seller">

		<div id="select_seller_div">
			<div id="select_seller_table">
				<h1>Select Sellers</h1>
				<table>
				<?php
					$query="";
					foreach($_SESSION['bucket'] as $key=>$value)
					{
						$query.="SELECT price*($value) as cost, u_id as vendor from tbl_prices WHERE cl_id=$key UNION ";
					}
					$query=rtrim($query," UNION");
					$query="SELECT t1.company_name, t1.company_logo, t2.total, t2.vendor FROM tbl_user t1 inner join (SELECT SUM(t.cost) as total, t.vendor as vendor FROM($query) t GROUP BY t.vendor) t2 ON t1.u_id=t2.vendor ORDER BY t2.total";
					$result=mysqli_query($con,$query) or die(mysqli_error($con));
					$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
					$paypal_id='sorathiyakartik88-buyer@gmail.com';  // sriniv_1293527277_biz@inbox.com
					while($row=mysqli_fetch_assoc($result))
					{
				?>
					<tr>
						<td><img src="../images/logo/<?php echo $row['company_logo'];?>" width="50px" height="50px"></td>
						<td><?php echo $row['company_name'];?></td>
						<td>$<?php echo $row['total'];?> <a href="<?php echo $_SERVER['PHP_SELF']."?u_id=".$row['vendor'];?>">
						<form action='<?php echo $paypal_url; ?>' method='post' name='pay_now'>
							<input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
							<input type='hidden' name='cmd' value='_xclick'>
							<input type='hidden' name='item_name' value='<?php echo $row['company_name'];?>'>
							<input type='hidden' name='item_number' value='<?php echo $row['vendor'];?>'>
							<input type='hidden' name='amount' value='<?php echo $row['total'];?>'>
							<input type='hidden' name='no_shipping' value='1'>
							<input type='hidden' name='currency_code' value='USD'>
							<input type='hidden' name='handling' value='0'>
							<input type='hidden' name='cancel_return' value='http://localhost/washers/content/cancel.php'>
							<input type='hidden' name='return' value='http://localhost/washers/content/payment_succesfully.php'>
							<input type='hidden' name='notify_url' value='http://localhost/washers/content/notify.php'>
							<input type="submit" value="Pay Now" name="SUBMIT" id="pay_now_button">
						</form>
						</td>
					</tr>
				<?php
						}
				?>
				</table>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	</div>
<?php
	require_once('../entities/footer.php');
?>
<script>
</script>
</body>
</html>
