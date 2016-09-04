<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/my_order_fns.php');

	if(!isLoggedIn()){
		mysqli_close($con);
		header("Location: ../extras/log_in.php");
		exit();
	}
?>
	<title>My Order</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>

<div id="banner_footer">
	<p>My Orders</p>
</div>
<div class="wrapper">
	<div id="my_order">
		<?php
			require_once('../entities/dashboard.php');
		?>
		<div id="my_order_div">
			<div id="my_order_table">
				<h1>My Orders</h1>
				<table>
					<tr>
						<th>Order No #</th>
						<th>Order Date</th>
						<?php
							if($_SESSION['u_type']=="vendor" || $_SESSION['u_type']=="customer")
							{
						?>
						<th>Total Price</th>
						<?php
							}
							else if($_SESSION['u_type']=="driver")
							{
								?>
						<th>Time</th>
								<?php
							}
						?>
						<th>Progress</th>
					</tr>
					<?php
						if($_SESSION['u_type']=="customer"){
							 $query="SELECT * FROM tbl_order WHERE cu_id=".$_SESSION['u_id'];
						}else if($_SESSION['u_type']=="vendor"){
							 $query="SELECT * FROM tbl_order WHERE ve_id=".$_SESSION['u_id'];
						}else if($_SESSION['u_type']=="driver") {
							 $query="SELECT * FROM tbl_order WHERE dr_id=".$_SESSION['u_id'];
						}else{}
						
						$result=mysqli_query($con,$query) or die(mysqli_error($con));
						while($row=mysqli_fetch_assoc($result))
						{
							$date = strtotime($row['date_time']);
							$time = date_create($row['date_time']);
					?>
					<tr>
						<td># <?php echo $row['o_id']; ?></td>
						<td><?php echo date('d/m/Y',$date); ?></td>
						<?php
							if($_SESSION['u_type']=="vendor" || $_SESSION['u_type']=="customer")
							{
						?>
						<td>$<?php echo $row['amount']?></td>
						<?php
							}
							else if($_SESSION['u_type']=="driver")
							{
								?>
						<td><?php echo date_format($time, 'g:i A');?></td>		
								<?php
							}
						?>
						<td><a href="my_order_view_details.php?o_id=<?php echo $row['o_id']?>">View Detail</a></td>
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
