<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	//require_once('../include/functions/contact_us_fns.php');

	$first_name ='';
	$phone_no = '';
	$email = '';
	$msg = '';
	$v_code = '';
	$veri_code = '';

	if(isset($_POST['submit_button']) && !empty($_POST['submit_button'])  &&  $_POST['submit_button']==='Submit')
	{

		$first_name = sanitize($con,$_POST['first_name']);
		$phone_no = sanitize($con,$_POST['phone_no']);
		$email = sanitize($con,$_POST['email']);
		$msg = sanitize($con,$_POST['msg']);
		$v_code=$_POST['v_code'];
		if(!empty($first_name) && !empty($phone_no) && !empty($email) && !empty($msg) && !empty($v_code))
		{
			$add=true;
			if($_SESSION['captcha']!=sha1($_POST['v_code'])){
				$add=false;
				$error_msgs[]="Incorrect Captcha Code";
			}

			$v_first_name = '/^[A-Za-z]{4,31}$/';
			if(!preg_match($v_first_name, $first_name))
			{
				$err_uname = "Please enter valid First name as it contains alphabets only";
				$error_msgs[]= $err_uname;
				$add = false;
				$first_name = "";
			}

			//Phone Number Validation

			$v_phone_number = ' /^[0-9]{10}$/';
			if(!preg_match($v_phone_number,$phone_no))
			{
				$err_msg = "Please enter valid phone number";
				$error_msgs[]= $err_msg;
				$add=false;
				$phone_no = "";
			}

			//Email Validation

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				$err_msg = "$email is not a valid email address";
				$error_msgs[]= $err_msg;
				$add=false;
				$email = "";
			}


			//Insertion of data into database
			if($add==true){
				$query = " insert into tbl_contactus (name,phone,email,message) values ('$first_name',$phone_no,'$email','$msg') ";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				mysqli_close($con);
				header('Location: ../extras/home.php');
			}
		}
		else
		{
			$error_msgs[]="Enter all FIELDS!!!";
		}
	}

	require_once('../include/generate_captcha.php');
?>
	<title>Contact Us</title>
<?php
	include_once('../entities/icon_title_bar.html');
	require_once('../entities/header.php');
?>
	<div class="banner_wrapper">
<?php
	require_once('../entities/banner.php');
	$id = 1;
	$query1 = "select ol_address,ol_office,ol_cell,ol_email from tbl_onlinelaundry where ol_id=".$id ;
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_assoc($result1);
?>
	</div>
	<div id="banner_footer">
		<p>Contact Us</p>
	</div>
	<div id="main">
		<div class="wrapper">
		<?php displayErrors($error_msgs);?>
		<div id="postal_add">
			<dl>
				<dt id="term">Postal Address:</dt>
				<dd>
					<p><?php echo $row1['ol_address'];?></p>
					<ul>
						<li id="office"><?php echo '('.substr($row1['ol_office'],0,3).')  '.substr($row1['ol_office'],3);?><span> (office) </span></li>
						<li id="cell"><?php echo '('.substr($row1['ol_cell'],0,3).')  '.substr($row1['ol_cell'],3);?><span> (cell) </span></li>
						<li id="mail"><?php echo $row1['ol_email'];?></li>
					</ul>
				</dd>
			</dl>
		</div>

		<div id="contact_info">
			<h1>Your Contact Information</h1>

			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name="contact_us">
				<div id="first_name_div">
					<label for="first_name">First Name:</label><br>
					<input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
				</div>
				<div id="phone_no_div">
					<label for="phone_no">Phone:</label><br>
					<input type="text" name="phone_no" id="phone_no" value="<?php echo $phone_no; ?>">
				</div>
				<div id="email_div">
					<label for="email">Email:</label><br>
					<input type="email" name="email" id="email" value="<?php echo $email; ?>">
				</div>
				<!--<img src="../images/banner_image.jpg" id="cnt_img">-->
				<img src="../images/contact_us_img.png" id="cnt_img">
				<div id="msg_div">
					<label for="msg">Message:</label><br>
					<textarea name="msg" id="msg"><?php echo $msg; ?></textarea>
				</div>
				<div id="v_code_div">
					<label for="v_code">Verification Code:</label><br>
					<img src="../images/captcha.png" alt="captcha" title="captcha" id="v_code_img">
					<input type="text" name="v_code" id="v_code">
					<input type="submit" name="submit_button" value="Submit" id="submit_button">
				</div>
			</form>
		</div>
		<div class="clear"></div>
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
?>
