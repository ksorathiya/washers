<?php
    require_once('../include/init.php');
    require_once('../include/functions/general_fns.php');
    require_once('../include/functions/login_fns.php');

    if(!isAdminLoggedIn())
    {
        mysqli_close($con);
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
        exit();
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
