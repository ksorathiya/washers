<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/register_fns.php');

	$u_name=$email=$phone=$address=$about_me=$company_name='';
	$isRegister=true;
	$target='';
	if(isset($_POST['SUBMIT']))
	{
		$u_name=sanitize($con,$_POST['u_name']);
		$email=sanitize($con,$_POST['email']);
		$password=md5(sanitize($con,$_POST['password']));
		$cnfm_password = md5(sanitize($con,$_POST['cnfm_password']));
		$phone=sanitize($con,$_POST['phone']);
		$company_name=sanitize($con,$_POST['company_name']);
		$about_me=sanitize($con,$_POST['about_me']);
		$address=sanitize($con,$_POST['address']);
		$logo=NULL;
		if(!empty($u_name)&&!empty($password)&&!empty($cnfm_password)
			&&!empty($email)&&!empty($phone)&&!empty($address)
			&&!empty($about_me)&&!empty($company_name)&&isset($_FILES['logo']))
		{
			if($password==$cnfm_password)
			{
				//image Upload
				if($_GET['u_type']=='vendor'||$_GET['u_type']=='driver'){
					if($_FILES['logo']['error']==1){
						$error_msgs[]='Error while uploading the image..';
						$isRegister=false;
					}
				}
				//UNIQUE EMAIL
				$query="SELECT email FROM tbl_user WHERE email='".$email."'";
				$result=mysqli_query($con,$query);
				if(mysqli_fetch_array($result))
				{
					$error_msgs[]='Email ID already used, try another EMAIL ID!!!';
					$email='';
					$isRegister=false;
				}

				//UNIQUE PHONE
				$query="SELECT phone FROM tbl_user WHERE phone='".$phone."'";
				$result=mysqli_query($con,$query);
				if(mysqli_fetch_array($result))
				{
					$error_msgs[]='Phone No. already used, try another Phone No.!!!';
					$phone='';
					$isRegister=false;
				}
				if($isRegister){

					$logo=time().$_FILES['logo']['name'];
					$target="../images/logo/";
					$query="INSERT INTO tbl_user(u_type,u_name,password,email,phone,address,about_me,company_name,company_logo)
						VALUES('{$_GET['u_type']}','$u_name','$password','$email',$phone,'$address','$about_me','$company_name','$logo')";
					echo $query;

					mysqli_query($con,$query)
						or die(mysqli_error($con));

					if($_GET['u_type']=='vendor'||$_GET['u_type']=='driver'){
						$target=$target.$logo;
						move_uploaded_file($_FILES['logo']['tmp_name'],$target);
					}
					/*$query="SELECT u_id FROM tbl_user WHERE u_name='".$u_name."' AND email='".$email."'";
					$result=mysqli_query($con,$query) or die(mysqli_error($con));
					$row=mysqli_fetch_assoc($result);
					*/
					$price=array();
					foreach($_POST as $key=>$value){
						if(!empty($value)&&is_numeric($key))
						{
							$price[$key]=$value;
							$query="INSERT INTO tbl_prices(cl_id,u_id,price) VALUES($key,(SELECT u_id FROM tbl_user WHERE u_name='".$u_name."' AND email='".$email."'),$value)";
							mysqli_query($con,$query) or die(mysqli_error($con));
						}
					}

					mysqli_close($con);
					header("Location: ../extras/log_in.php?reg");
					exit();
				}
			}else{
				$error_msgs[]="Password and Confirm Password does not MATCH!!!";
			}
		}
		else
		{
			$error_msgs[]="Enter all FIELDS!!!";
		}
	}
?>
	<title>Register</title>
<?php
		include_once('../entities/icon_title_bar.html');
		require_once('../entities/header.php');
		require_once('../entities/banner.php');
?>
			<div id="banner_footer">
				<p>Register  <?php echo ucfirst($_GET['u_type']); ?></p>
			</div>
			<div class="wrapper">
				<div id="customer_info">
					<h1>Register as a <?php echo ucfirst($_GET['u_type']); ?></h1>
					<?php displayErrors($error_msgs);?>
					<form action="<?php echo $_SERVER['PHP_SELF']?>?u_type=<?php echo $_GET['u_type'];?>" 
							method="POST" name="<?php echo $_GET['u_type']; ?> Registration" enctype="multipart/form-data">
						<div id="username_div">
							<label for="username">Username:</label><br>
							<input type="text" id="username" name="u_name" value="<?php echo $u_name; ?>">
						</div>
						<div id="email_div">
							<label for="email">Email:</label><br>
							<input type="text" id="email" name="email" value="<?php echo $email; ?>">
						</div>
						<div id="password_div">
							<label for="password">Password:</label><br>
							<input type="password" id="password" name="password" >
						</div>
						<div id="phone_no_div">
							<label for="phone_no">Phone:</label><br>
							<input type="text" id="phone_no" name="phone" value="<?php echo $phone; ?>">
						</div>
						<div id="cnfm_password_div">
							<label for="cnfm_password">Confirm Password:</label><br>
							<input type="password" id="cnfm_password" name="cnfm_password">
						</div>
						<div id="company_div">
							<label for="company_name">Company Name:</label><br>
							<input type="text" id="company_name" name="company_name" value="<?php echo $company_name; ?>">
						</div>
						<div id="about_me_div">
							<label for="about_me">About Me:</label><br>
							<textarea id="about_me" name="about_me"><?php echo $about_me; ?></textarea>
						</div>
						<div id="address_div">
							<label for="address">Address:</label><br>
							<textarea id="address" name="address"><?php echo $address; ?></textarea>
						</div>
						<div class="clear"></div>
						<br>
						<?php
						if($_GET['u_type']=='vendor'||$_GET['u_type']=='driver'){
						?>
							<div id="logo_div">
								<label for="logo">Your Logo:</label><br>
								<input type="file" id="logo" name="logo">
							</div>
							<div class="clear"></div>
							<br>
							<br>
						<form action="../service.php" method="POST" name="add prices">
							<?php
							if($_GET['u_type']=='vendor'){
								$query="SELECT c_id, c_name FROM tbl_category";
								$result=mysqli_query($con,$query) or die(mysqli_error($con));
								while($row=mysqli_fetch_array($result)){
									echo "<div id=\"{$row['c_name']}\" class=\"category\"><h1>{$row['c_name']}</h1>";
									echo "<ul>";
									$query1="SELECT cl_id, cl_name FROM tbl_clothes WHERE c_id=".$row['c_id'];
									$result1=mysqli_query($con,$query1) or die(mysqli_error($con));
									while($row1=mysqli_fetch_assoc($result1))
									{
										echo "<li><label for=\"{$row1['cl_id']}\">{$row1['cl_name']}</label>   $ 	  	<input required name=\"{$row1['cl_id']}\" type=\"text\" class=\"price\"></li>";
									}
									echo "</ul>";
									echo "</div>";
								}
							}
						}
						?>
						<input type="submit" value="Register" id="register_button" name="SUBMIT">
					</form>
				</div>
			</div>
			<div class="clear"></div>
<?php
	require_once('../entities/footer.php');
?>
<script>
</script>
</body>
</html>
