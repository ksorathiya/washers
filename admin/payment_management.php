<?php

    if(isset($_GET['del']) && !empty($_GET['del']))
    {
        $query="DELETE FROM tbl_order WHERE o_id={$_GET['del']}";
        mysqli_query($con,$query) or die(mysqli_error($con));
    }
?>
<?php require_once("header.php"); ?>
<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Payment Management</span>
				</h2>
		    </div>

		<div class="content-top">
			<div class=" col-md-12 ">

                <div class="grid-form1">
                <h3>Payment Management</h3>
				    <table>
						<?php
							$query = "SELECT u_id, u_name FROM tbl_user WHERE u_type='vendor'";
							$result=mysqli_query($con,$query) or die(mysqli_error($con));
							if(mysqli_num_rows($result)!=0)
							{
						?>
						<tr>
							<th>Vendor</th>
							<th>Amount</th>
						</tr>
						<?php
							while($row=mysqli_fetch_array($result))
							{
								echo '<tr>';
								echo '<td>'.$row['u_name'].'</td>';
                                $q="SELECT sum(amount) as amount from tbl_order WHERE ve_id={$row['u_id']} GROUP BY ve_id";
                                $rs=mysqli_query($con,$q) or die(mysqli_error($con));
                                $r=mysqli_fetch_assoc($rs);
								echo '<td>'.$r['amount'].'</td>';
								echo '</tr>';
							}
							}else{
								echo "<div class=\"alert alert-warning\" type=\"alert\">NO DATA FOUND</div>";
							}
						?>
				    </table>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
	</div>
</div>
		<!----->
		<!--//content-->
		<!---->
		<div class="clearfix"> </div>
<!---->
<!--scrolling js-->
<?php
    require_once("footer.php");
?>
</body>
</html>
