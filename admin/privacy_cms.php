<?php
	require_once("header.php");
	$id = 1;
	$home_text = $about_text = $privacy_policy_text="";
    if(isset($_POST['update_privacy_policy_btn']) && !empty($_POST['update_privacy_policy_btn']) && $_POST['update_privacy_policy_btn'] === 'u_p_p_btn')
    {
        if(!empty($_POST['privacy_policy_text']))
        {
            $privacy_policy_text = sanitize($con,$_POST['privacy_policy_text']);
            $privacy_policy_update_query = "update tbl_onlinelaundry set ol_privacypolicy = '$privacy_policy_text' where ol_id=".$id;
            $result_p_p_t = mysqli_query($con,$privacy_policy_update_query) or die(mysqli_error($con));
            $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cms.php";
        }
        else
        {
            echo'Text for Privacy Policy page can not be empty.';
        }
    }

    $query ="select ol_privacypolicy from tbl_onlinelaundry where ol_id=".$id;
	$result =  mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_fetch_assoc($result);

?>
<?php ?>
<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Privacy Policy CMS</span>
				</h2>
		    </div>
		<div class="content-top">
			<div class=" col-md-12 ">

                <div class="grid-form1">
                    <h3>Privacy Policy CMS</h3>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <label for="privacy_policy">Description of Washers' Privacy Policy :</label><br/><br/>
                        <textarea class="ckeditor" name="privacy_policy_text" ><?php echo $row['ol_privacypolicy'];?></textarea><br/>
                        <button type="submit" class="button" id="update_privacy_policy_btn" name="update_privacy_policy_btn" value="u_p_p_btn">
                            Update Privacy Policy</button>
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</body>
</html>
