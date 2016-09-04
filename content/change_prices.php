<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/my_order_fns.php');

	if(!isLoggedIn()){
		mysqli_close($con);
		header("Location: ../extras/log_in.php");
		exit();
	}
	if(isset($_POST['SUBMIT']))
	{
		//print_r($_POST);
		$price=array();
		foreach($_POST as $key=>$value){
			if(!empty($value)&&is_numeric($key))
			{
				$price[$key]=$value;
				$query="UPDATE tbl_prices SET price=$value WHERE cl_id=$key AND u_id={$_SESSION['u_id']}";
				mysqli_query($con,$query) or die(mysqli_error($con));
			}
		}
	}
?>
	<title>Change Prices</title>
<?php	
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
	require_once('../entities/banner.php');
?>
	<div id="banner_footer">
		<p>Change Prices</p>
	</div>
	<div class="wrapper">
	<div id="new_order_view_details">
		<?php
			require_once('../entities/dashboard.php');
		?>
	<div id="new_order_view_details_div">
		<div id="new_order_view_details_table">
		<h1>Change Price</h1>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="add price">
				<?php

					$query="SELECT c_id, c_name FROM tbl_category";
					$result=mysqli_query($con,$query) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($result)){
						echo "<div id=\"{$row['c_name']}\" class=\"category\"><h1>{$row['c_name']}</h1>";
						echo "<ul>";
						$query1="SELECT cl.cl_id, cl.cl_name, p.price FROM tbl_clothes cl inner join tbl_prices p ON cl.cl_id=p.cl_id WHERE c_id=".$row['c_id']." AND u_id=".$_SESSION['u_id'];
						$result1=mysqli_query($con,$query1) or die(mysqli_error($con));
						while($row1=mysqli_fetch_assoc($result1))
						{
							echo "<li><label for=\"{$row1['cl_id']}\">{$row1['cl_name']}:</label>
							$  <input required name=\"{$row1['cl_id']}\" type=\"text\" class=\"price\" value=\"{$row1['price']}\"></li>";
						}
						echo "</ul>";
						echo "</div>";
					}
				?>
				<input type="submit" value="Save" id="register_button" name="SUBMIT">
			</form>
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
