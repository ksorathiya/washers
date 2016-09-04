<?php require_once("header.php"); ?>
<?php
    if(isset($_GET['del']) && !empty($_GET['del']))
    {
        $query="DELETE FROM tbl_order WHERE o_id={$_GET['del']}";
        mysqli_query($con,$query) or die(mysqli_error($con));
    }
?>

<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Order Management</span>
				</h2>
		    </div>

		<div class="content-top">
			<div class=" col-md-12 ">
                <div class="grid-form1">
                <h3>Order Management</h3>
				    <table>
						<?php
							$query = "SELECT * FROM
							(SELECT c.customer, v.vendor, d.driver, c.o_id from
								(SELECT u.u_name as customer, o.o_id FROM tbl_user u inner join tbl_order o ON u.u_id = o.cu_id) c
								INNER JOIN
								(SELECT u.u_name as vendor, o.o_id FROM tbl_user u inner join tbl_order o ON u.u_id = o.ve_id) v
								ON c.o_id=v.o_id INNER JOIN (SELECT u.u_name as driver, o.o_id FROM tbl_user u inner join tbl_order o ON u.u_id = o.dr_id) d ON v.o_id=d.o_id ) tbl1 INNER JOIN tbl_order tbl2 ON tbl1.o_id=tbl2.o_id ";
							$result=mysqli_query($con,$query) or die(mysqli_error($con));
							if(mysqli_num_rows($result)!=0)
							{
						?>
						<tr>
							<th>Order ID</th>
							<th>Customer</th>
							<th>Vendor</th>
							<th>Driver</th>
							<th>Amount</th>
							<th>Date-Time</th>
							<th>DELETE?</th>
							<th>View Details</th>
						</tr>
						<?php
							while($row=mysqli_fetch_array($result))
							{
								echo '<tr>';
								echo '<td>'.$row['o_id'].'</td>';
								echo '<td>'.$row['customer'].'</td>';
								echo '<td>'.$row['vendor'].'</td>';
								$q="SELECT u_name, u_id FROM tbl_user WHERE u_type='driver'";
								$rs=mysqli_query($con,$q) or die(mysqli_error($con));
								echo "<td><select class=\"driver_select\" name=\"{$row['o_id']}\">";
								while($r=mysqli_fetch_assoc($rs))
								{
									/*if($row['dr_id']=NULL){
										echo "<option selected value=\"{$r['u_id']}\">none</option>";
									}else*/ if($r['u_id']==$row['dr_id'])
									{
										echo "<option selected value=\"{$r['u_id']}\">{$r['u_name']}</option>";
									}else{
										echo "<option value=\"{$r['u_id']}\">{$r['u_name']}</option>";
									}

								}
								echo '</select></td>';
								echo '<td>'.$row['amount'].'</td>';
								echo '<td>'.$row['date_time'].'</td>';
								echo '<td><a href="'.$_SERVER['PHP_SELF'].'?del='.$row['o_id'].' "><button type="button" class="btn btn-danger">DELETE</button></a></td>';
								echo '<td><button type="button" name="'.$row['o_id'].'" class="get_order_details btn btn-primary" data-toggle="modal" data-target="#myModal">View Details</button></td>';
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
<div class="grid_3 grid_5">
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							  <h2 class="modal-title">Order Details</h2>
						  </div>
						  <div class="modal-body">
							<ul id="order_details">
			  					<li>Category :</li>
			  					<li>Job# :</li>
			  				</ul>
							<hr>
							<div id="my_order_view_details_table">
								<table>

								</table>
							</div>
							<h4 id="total">Total Price: $</h4>
							<div class="clear"></div>
						  </div>
						  <!--<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  <button type="button" class="btn btn-primary">Save changes</button>
						  </div>-->
					  </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
			  </div>
		 </div>

<?php
    require_once("footer.php");
?>
<script>
$(document).ready(function(){
	$(".driver_select").change(function(){
		var dr_id=$(this).val();
		var o_id=$(this).attr('name');
		var data={'dr_id':dr_id,'o_id':o_id};
		$.post("../service.php?action=select_driver",data,function(){

		});
	});

	$('.get_order_details').click(function(e){
		var url="action=get_details&o_id="+$(this).attr('name');
		$.getJSON("../service.php?"+url,function(JSON){
			JSON=JSON.data;
			$("#order_details li:nth-child(1)").html("Category Name:- "+JSON.category_name);
			$("#order_details li:nth-child(2)").html("Job#:- "+JSON.job_id);
			$("#total").html("Total price:- $"+JSON.amount);
			$("#my_order_view_details_table table").html("<tr><th>Clothes</th><th>Quantity</th></tr>");
			for(i=0;i<JSON.clothes.length;i++)
			{
				$("#my_order_view_details_table table").append("<tr><td>"+JSON.clothes[i]+"</td><td>"+JSON.quantity[i]+"</td></tr>");
			}
		});
		e.preventDefault();
	});
});
</script>
</body>
</html>
