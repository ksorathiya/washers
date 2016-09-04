<?php
	$_SESSION['title']='Admin | Home';
	require_once("header.php");

	$id = 1;
	$company_name=$office_contact=$cell_contact=$address=$email_id="";
    $errors=array();
    if(isset($_POST['SUBMIT']))
	{
		if(!empty($_POST['company_name'])&&!empty($_POST['office_contact'])&&!empty($_POST['cell_contact'])&&!empty($_POST['address'])&&!empty($_POST['email_id']))
		{
            $company_name=sanitize($con,$_POST['company_name']);
            $office_contact=sanitize($con,$_POST['office_contact']);
            $cell_contact=sanitize($con,$_POST['cell_contact']);
            $address=sanitize($con,$_POST['address']);
            $email_id=sanitize($con,$_POST['email_id']);
			$home_text_update_query = "update tbl_onlinelaundry set ol_name='$company_name', ol_office='$office_contact', ol_cell='$cell_contact', ol_address='$address', ol_email='$email_id' where ol_id=".$id;
			$result_u_h_t = mysqli_query($con,$home_text_update_query) or die(mysqli_error($con));
            $errors[]='<div class="alert alert-success">Contact Details Updated</div>';
		}
		else
		{
			$errors[]='<div class="alert alert-warning">Enter All Fields.</div>';
		}
	}

	$query = "select * from  tbl_onlinelaundry where ol_id=".$id;
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_fetch_assoc($result);
    $company_name=$row['ol_name'];
    $office_contact=$row['ol_office'];
    $cell_contact=$row['ol_cell'];
    $address=$row['ol_address'];
    $email_id=$row['ol_email'];
?>

<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Contacts CMS</span>
				</h2>
		    </div>

		<div class="content-top">
			<div class=" col-md-12 ">
                <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }

                ?>
                <div class="grid-form1">
					<h3>Contacts CMS</h3>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
      				    <label for="company_name" class="col-sm-2 control-label hor-form">Company Name</label>
      				    <div class="col-sm-10">
      				      <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" placeholder="Enter Company's Name">
      				    </div>
      				    </div>
                        <div class="form-group">
      				    <label for="office_contact" class="col-sm-2 control-label hor-form">Office Contact</label>
      				    <div class="col-sm-10">
      				      <input type="text" class="form-control" id="office_contact" name="office_contact" value="<?php echo $office_contact; ?>" placeholder="Enter Office's Contact">
      				    </div>
      				    </div>
                        <div class="form-group">
    				    <label for="cell_contact" class="col-sm-2 control-label hor-form">Cell Contact</label>
    				    <div class="col-sm-10">
    				      <input type="text" class="form-control" id="cell_contact" name="cell_contact" value="<?php echo $cell_contact; ?>" placeholder="Enter Cell's Contact">
    				    </div>
    				    </div>
                          <div class="form-group">
        				    <label for="email_id" class="col-sm-2 control-label hor-form">Email ID</label>
        				    <div class="col-sm-10">
        				      <input type="text" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>" placeholder="Enter Email Id">
        				    </div>
                        </div>
                      <div class="form-group">
    				    <label for="address" class="col-sm-2 control-label hor-form">Address</label>
    				    <div class="col-sm-10">
    				      <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Enter Address">
    				    </div>
    				  </div>
						<button type="submit" class="button" name="SUBMIT">Update Contacts</button>
					</form>
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</body>
</html>
