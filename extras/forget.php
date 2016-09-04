<!doctype html public>
<html>
	<head>
		<title>Admin-Forget</title>
		<link href="../css/admin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
    <?php    
		$email="";
		$phone="";
		$errors=array();
		$output_form=true;
		if(isset($_POST['SUBMIT']))
		{

			if(!empty($_POST['email']) || !empty($_POST['phone']))
			{
				$output_form=false;
				require_once('../connectvars.php');
				if(!empty($_POST['email']))
					$contact=mysqli_real_escape_string($con,trim($_POST['email']));
				if(!empty($_POST['phone']))
					$contact=mysqli_real_escape_string($con,trim($_POST['phone']));

				$query="SELECT u_id FROM tbl_user WHERE (phone='".$contact."' or email='".$contact."') and u_type='ADMIN'";
				$result=mysqli_query($con,$query) or die(mysqli_error($con));

				if(mysqli_num_rows($result)==0)
				{
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/forget_identify.php?no");
				}else{
					$row=mysqli_fetch_array($result);
					header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/forget_identify.php?u_id=".$row['u_id']);
				}

			}else{
				array_push($errors,"Enter at least one contact.");
				unset($email,$phone);
			}

		}

		if($output_form==true)
		{
	?>
	<div id="forget">
		<!--<div id="content popup">-->
			<div id="popup-window" class="white-popup mfp-hide">
				<h2>Forgot Login </h2>
				<img src="../images/logo.png" title="washers">
				<div class="popup-content">
					<p class="highlight"><?php foreach($errors as $error) echo $error;?></p>
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
							<input type="text" name="email" placeholder="Email ID" <?php if(!isset($email)) echo "class=\"invalid_input\"";?>>
							<strong>OR</strong>
							<input type="text" name="phone" placeholder="Phone No." <?php if(!isset($phone)) echo "class=\"invalid_input\"";?>>
							<input type="submit" name="SUBMIT" value="Recover Account &nbsp;&#xf021;" id="submit_button">
						</form>
						<span><a href="index.php" title="Login Page"><< Back to LOGIN.</a></span>
				</div>
			</div>
		<!--</div>-->
	</div>
	<?php
		}
	?>
	<script src="../js/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function(){
	
	var popup=$('.popup').magnificPopup({
	  items: {
		  src: '#popup-window',
		  type: 'inline',
	  },
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	$('.popup').click(function(){
		var c_id = $(this).attr("id");

		

		});
	});
	

</script>
	</body>
</html>
