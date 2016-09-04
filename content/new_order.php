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
	<title>New Order</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
<div id="banner_footer">
	<p>New Order</p>
</div>
<div class="wrapper">
	<div id="laundry_new_order">
	<?php
		require_once('../entities/dashboard.php');
	?>
		<div id="new_order_div">
			<div id="new_order_table">
				<h1>New Orders</h1>
				<table>
					<tr>
						<th>Job#</th>
						<th>Date</th>
						<th>Time</th>
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
					?>
					<tr>
						<td># <?php echo $row['o_id']?></td>
						<td><?php echo date('m/d/Y',$date)?></td>
						<td><?php echo $row['date_time']?></td>
						<td><a href="new_order_view_details.php?o_id=<?php echo $row['o_id']?>"><span class="orange_color">View Detail</span></a></td>
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
