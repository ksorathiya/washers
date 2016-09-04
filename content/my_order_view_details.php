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
	<title>Order Details</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
<div id="banner_footer">
	<p>My Order Details</p>
</div>
<div class="wrapper">
	<div id="my_order_view_details">
		<?php
			require_once('../entities/dashboard.php');
		?>
		<?php
			$query="SELECT * FROM tbl_order WHERE o_id=".$_GET['o_id'];
			$result=mysqli_query($con,$query) or die(mysqli_error($con));
			$row=mysqli_fetch_assoc($result);
			$clothes=explode(',',$row['clothes']);
			$quantities=explode(',',$row['quantities']);

		?>
		<ul id="order_details">
			
			<li>Category :	<?php
				$q="SELECT c_name FROM tbl_category WHERE c_id=".$row['c_id'];
				$res=mysqli_query($con,$q);
			 	$r=mysqli_fetch_assoc($res);
				echo $r['c_name'];
			?></li>
			<li>Order No # <span class="orange_color"> <?php echo $row['o_id']; ?></span></li>
		</ul>
		<div id="my_order_view_details_div">
			<div id="my_order_view_details_table">
				<h1>Order Detail</h1>
				<table>
					<?php
						for($i=0;$i<sizeof($clothes);$i++)
						{
							$q1="SELECT cl_name FROM tbl_clothes WHERE cl_id=".$clothes[$i];
							$res=mysqli_query($con,$q1);
							$r1=mysqli_fetch_assoc($res);
							echo "<tr>";
							echo "<td class='clname'>{$r1['cl_name']}</td>";
							echo "<td class='quant'>Qty: {$quantities[$i]}</td>";
							echo "</tr>";
						}
					?>

				</table>
				<p id="total">Total Price: <span class="orange_color">$<?php echo $row['amount'] ?></span></p>
				<div class="clear"></div>
				<a href="my_order.php"><p id="back">Back</p></a>
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
