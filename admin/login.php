<?php
    require_once('../include/init.php');
    require_once('../include/functions/general_fns.php');
    require_once('../include/functions/login_fns.php');

    if(isAdminLoggedIn())
    {
        mysqli_close($con);
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
        exit();
    }
    $_SESSION['title']="Admin | Login";

    $email='';
    if(isset($_POST['SUBMIT']))
    {
        $email=sanitize($con,$_POST['email']);
        $password=md5(sanitize($con,$_POST['password']));

        if(!empty($email)&&!empty($password))
        {
            $query="SELECT u_id, u_type FROM tbl_user WHERE email='".$email."' and password='".$password."' and u_type='admin'";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));

            if(mysqli_num_rows($result)!=1){
                $error_msgs[]="Invalid Username of Password";
            }else{
                $row = mysqli_fetch_assoc($result);
                admin_login($row);
                mysqli_close($con);
                header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../admin/index.php");
                exit();
            }
        }else{
            $error_msgs[]="Enter All FIELDS!!!";
        }
    }

?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php if(isset($_SESSION['title'])) echo $_SESSION['title']; else echo 'WASHERS';?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<style media="screen">
    table{
        width:100%;
    }
    tr{

    }
    table,td,th{
        text-align:center;
    }
    ul{
        list-style: none;
    }
    #total{
        margin-top:20px;
    }
</style>
<script src="js/jquery.min.js"> </script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
    <div class="login">
    		<h1><a href="index.html">Washers</a></h1>
    		<div class="login-bottom">
    			<h2>Login</h2>
                <?php
                    foreach($error_msgs as $msg)
                    {
                        echo '<div class="alert alert-danger">'.$msg.'</div>';
                    }
                ?>
    			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    			<div class="col-md-12">
    				<div class="login-mail">
    					<input type="text" placeholder="Email" required="" name="email">
    					<i class="fa fa-envelope"></i>
    				</div>
    				<div class="login-mail">
    					<input type="password" placeholder="Password" required="" name="password">
    					<i class="fa fa-lock"></i>
    				</div>
				   <a class="news-letter " href="#">
					 <label class="checkbox1">Forget Password</label>
				   </a>
    			</div>
    			<div class="col-sm-12 login-do">
    				<label class="hvr-shutter-in-horizontal login-sub">
    					<input type="submit" value="login" name="SUBMIT">
    				</label>
    			</div>

    			<div class="clearfix"> </div>
    			</form>
    		</div>
    	</div>
<?php
    require_once('footer.php');
 ?>
