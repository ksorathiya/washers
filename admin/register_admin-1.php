<?php
        $u_name="";
        $email="";
        $password="";
        $phone="";
        $company_name="";
        $about_me="";
        $address="";
        $errors=array();
        $output_form=true;
        if(isset($_POST['SUBMIT']))
        {
            $output_form=true;
            $u_name=mysqli_real_escape_string($con,trim($_POST['u_name']));
            $password=sha1(mysqli_real_escape_string($con,trim($_POST['password'])));
            $cnfm_password=sha1(mysqli_real_escape_string($con,trim($_POST['cnfm_password'])));
            $email=mysqli_real_escape_string($con,trim($_POST['email']));
            $phone=mysqli_real_escape_string($con,trim($_POST['phone']));
            $address=mysqli_real_escape_string($con,trim($_POST['address']));
            $about_me=mysqli_real_escape_string($con,trim($_POST['about_me']));
            $company_name=mysqli_real_escape_string($con,trim($_POST['company_name']));

            if(!empty($u_name)&&!empty($password)&&!empty($cnfm_password)&&!empty($email)&&!empty($phone)&&!empty($address)&&!empty($about_me)&&!empty($company_name))
            {
                if($password==$cnfm_password)
                {
                    $register=true;
                    //UNIQUE USERNAME
                    $query="SELECT u_name FROM tbl_user WHERE u_name='".$u_name."'";
                    $result=mysqli_query($con,$query);
                    if(mysqli_fetch_array($result))
                    {
                        array_push($errors,'Username already used, try another USERNAME!!!');
                        $output_form=true;
                        $register=false;
                        $u_name='';
                    }
                    //UNIQUE EMAIL
                    $query="SELECT email FROM tbl_user WHERE email='".$email."'";
                    $result=mysqli_query($con,$query);
                    if(mysqli_fetch_array($result))
                    {
                        array_push($errors,'Email ID already used, try another EMAIL ID!!!');
                        $output_form=true;
                        $register=false;
                        $email='';
                    }
                    //UNIQUE PHONE
                    $query="SELECT phone FROM tbl_user WHERE phone='".$phone."'";
                    $result=mysqli_query($con,$query);
                    if(mysqli_fetch_array($result))
                    {
                        array_push($errors,'Phone No. already used, try another PHONE!!!');
                        $output_form=true;
                        $register=false;
                        $phone='';
                    }
                    //REGISTER
                    if($register==true)
                    {
                        $query="INSERT INTO tbl_user(u_type,u_name,password,email,phone,address,about_me,company_name) VALUES('admin','$u_name','$password','$email',$phone,'$address','$about_me','$company_name')";
                        mysqli_query($con,$query)
                            or die(mysqli_error($con));
                        array_push($errors,"New Admin Generated!!!!");
                        $u_name="";
                        $email="";
                        $password="";
                        $phone="";
                        $company_name="";
                        $about_me="";
                        $address="";

                    }
                    mysqli_close($con);
                }else{
                    array_push($errors,"Password and Confirm Password does not MATCH!!!");
                    $output_form=true;
                }

            }else{
                array_push($errors,"Enter all FIELDS!!!");
                $output_form=true;
            }
        }

?>
<!doctype html public>
<html>
<head>
	<title>Admin-Log In</title>
	<?php include_once('../entities/icon_title_bar.html');?>
	<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="body">
<div id="dashboard">
	<div id="content">
		<div id="left">
			<ul>
				<li><a href="register_admin.php" class="selected">Register New Admin</a></li>
				<li><a href="order_management.php">Order Management</a></li>
				<li><a href="payment_management.php">Payment Management</a></li>
				<li><a href="cms.php">CMS</a></li>
				<li><a href="faqs.php">FAQs</a></li>
			</ul>
		</div>
		<div id="right">
            <div id="register">
            	<div id="content">
            <?php
            if($output_form==true)
            {
            	foreach($errors as $error)
            		echo "<p class=\"error\">$error</p>";
            ?>
            	<h1>Register New Admin</h1>
            	<hr>
            	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name="Customer Registration">
            		<div id="u_name_div">
            			<input type="text" id="u_name" name="u_name" value="<?php echo $u_name; ?>" placeholder="Username">
            		</div>
            		<div id="email_div">
            			<input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="Email ID">
            		</div>
            		<div id="password_div">
            			<input type="password" id="password" name="password" placeholder="Password">
            		</div>
            		<div id="cnfm_password_div">
            			<input type="password" id="cnfm_password" name="cnfm_password" placeholder="Confirm Password">
            		</div>
            		<div id="phone_div">
            			<input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" placeholder="Phone No.">
            		</div>
            		<div id="company_name_div">
            			<input type="text" id="company_name" name="company_name" value="<?php echo $company_name; ?>" placeholder="Company Name">
            		</div>
            		<div id="about_me_div">
            			<label for="about_me">About Me:</label>
            			<textarea id="about_me" name="about_me" placeholder="Something about you..."><?php echo $about_me; ?></textarea>
            		</div>
            		<div id="address_div">
            			<label for="address">Address:</label>
            			<textarea id="address" name="address" placeholder="Address"><?php echo $address; ?></textarea>
            		</div>

            		<input type="submit" value="Register" id="submit_button" name="SUBMIT">
            		<input type="reset" value="Reset" id="submit_button" name="RESET">
            	</form>
            	</div>
            </div>

		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php
    }
?>
</body>
</html>
