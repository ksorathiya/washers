<?php
	$_SESSION['title']='Admin | Home';
	require_once("header.php");

	$id = 1;
	$home_text = $about_text = "";
	if(isset($_POST['update_home_text_btn']) && !empty($_POST['update_home_text_btn']))
	{
		if(!empty($_POST['home_text']))
		{
			$home_text = sanitize($con,$_POST['home_text']);
			$home_text_update_query = "update tbl_home set h_text ='$home_text' where h_id=".$id;
			$result_u_h_t = mysqli_query($con,$home_text_update_query) or die(mysqli_error($con));
		}
		else
		{
			echo 'Text for Home page can not be empty.';
		}
	}

	$query = "select h_text from  tbl_home where h_id=".$id;
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_fetch_assoc($result);

?>

<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Home Page CMS</span>
				</h2>
		    </div>

		<div class="content-top">
			<div class=" col-md-12 ">

                <div class="grid-form1">
					<h3>Home Page CMS</h3>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<label for="home_text">Description of Washers at Home Page:</label><br/><br/>
						<textarea class="ckeditor" name="home_text" ><?php echo $row['h_text'];?></textarea><br/>
						<button type="submit" class="button" id="update_home_text_btn" name="update_home_text_btn" value="u_h_t_btn">
							Update Home Text</button>
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
