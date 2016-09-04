<?php
    require_once('../include/init.php');
    require_once('../include/functions/general_fns.php');
    require_once('../include/functions/login_fns.php');

    if(!isAdminLoggedIn())
    {
        mysqli_close($con);
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../index.php");
        exit();
    }
    $_SESSION['title']="Admin | Register";
    require_once("header.php");

    $u_name="";
    $email="";
    $password="";
    $cnfm_password="";
    $phone="";
    $company_name="";
    $about_me="";
    $address="";
    $errors=array();
    if(isset($_POST['SUBMIT']))
    {
        $u_name=sanitize($con,$_POST['u_name']);
        $password=sha1(sanitize($con,$_POST['password']));
        $cnfm_password=sha1(sanitize($con,$_POST['cnfm_password']));
        $email=sanitize($con,$_POST['email']);
        $phone=sanitize($con,$_POST['phone']);
        $address=sanitize($con,$_POST['address']);
        $about_me=sanitize($con,$_POST['about_me']);
        $company_name=sanitize($con,$_POST['company_name']);

        if(!empty($u_name)&&!empty($password)&&!empty($cnfm_password)&&!empty($email)&&!empty($phone)&&!empty($address)&&!empty($about_me)&&!empty($company_name))
        {
            if($password==$cnfm_password)
            {
                $register=true;
                //UNIQUE USERNAME
                $query="SELECT u_name FROM tbl_user WHERE u_name='".$u_name."'";
                $result=mysqli_query($con,$query) or die(mysqli_error($con));
                if(mysqli_fetch_array($result))
                {
                    array_push($errors,'<div class="alert alert-warning" role="alert">Username already used, try another USERNAME!!!</div>');
                    $register=false;
                    $u_name='';
                }
                //UNIQUE EMAIL
                $query="SELECT email FROM tbl_user WHERE email='".$email."'";
                $result=mysqli_query($con,$query) or die(mysqli_error($con));
                if(mysqli_fetch_array($result))
                {
                    array_push($errors,'<div class="alert alert-warning" role="alert">Email ID already used, try another EMAIL ID!!!</div>');
                    $register=false;
                    $email='';
                }
                //UNIQUE PHONE
                $query="SELECT phone FROM tbl_user WHERE phone='".$phone."'";
                $result=mysqli_query($con,$query) or die(mysqli_error($con));
                if(mysqli_fetch_array($result))
                {
                    array_push($errors,'<div class="alert alert-warning" role="alert">Phone No. already used, try another PHONE!!!</div>');
                    $register=false;
                    $phone='';
                }
                //REGISTER
                if($register==true)
                {
                echo    $query="INSERT INTO tbl_user(u_type,u_name,password,email,phone,address,about_me,company_name) VALUES('admin','$u_name','$password','$email',$phone,'$address','$about_me','$company_name')";
                    mysqli_query($con,$query) or die(mysqli_error($con));
                    $u_name="";
                    $email="";
                    $password="";
                    $phone="";
                    $company_name="";
                    $about_me="";
                    $address="";
                    array_push($errors,"<div class=\"alert alert-success\" role=\"alert\">New Admin Registered</div>");
                    mysqli_close($con);
                }
            }else{
                array_push($errors,"<div class=\"alert alert-warning\">Password and Confirm Password does not MATCH!!!</div>");
            }
        }else{
            array_push($errors,"<div class=\"alert alert-warning\">Enter all FIELDS!!!</div>");
        }
    }
?>
<?php
?>
<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Register New Admin</span>
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
				<h3 id="forms-horizontal">Register New Admin</h3>
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				  <div class="form-group">
				    <label for="username" class="col-sm-2 control-label hor-form">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="username" name="u_name" value="<?php echo $u_name; ?>" placeholder="Enter New Admin's Username">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email_id" class="col-sm-2 control-label hor-form">Email ID</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="email_id" name="email" value="<?php echo $email; ?>" placeholder="Enter New Admin's Email ID">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label hor-form">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="password" name="password"  placeholder="Enter New Admin's Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="cnfm_password" class="col-sm-2 control-label hor-form">Confirm Password</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="cnfm_password" name="cnfm_password"  placeholder="Verify New Admin's Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="phone_no" class="col-sm-2 control-label hor-form">Phone No.</label>
				    <div class="col-sm-10">
				      <input type="phone" class="form-control" id="phone_no" name="phone" value="<?php echo $phone; ?>" placeholder="Enter New Admin's Phone No.">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="company_name" class="col-sm-2 control-label hor-form">Company Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" placeholder="Enter New Admin's Company Name">
				    </div>
				  </div>
				  <div class="form-group">
					  <label for="about_me" class="col-sm-2 control-label">About Me</label>
					  <div class="col-sm-8"><textarea name="about_me" id="about_me" name="about_me" cols="50" rows="4" class="form-control1"><?php echo $about_me; ?></textarea></div>
				  </div>
				  <div class="form-group">
					  <label for="address" class="col-sm-2 control-label">Address</label>
					  <div class="col-sm-8"><textarea name="address" id="address" cols="50" name="address" rows="4" class="form-control1"><?php echo $address; ?></textarea></div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" name="SUBMIT" class="btn btn-default">Register</button>
				    </div>
				  </div>
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
    require_once("footer.php")
?>
</body>
</html>
