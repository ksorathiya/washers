<?php
require_once("header.php");
$_SESSION['title']='Admin | About us';
	$id = 1;
	$home_text = $about_text = "";
	if(isset($_POST['update_about_text_btn']) && !empty($_POST['update_about_text_btn']) && $_POST['update_about_text_btn'] === 'u_a_t_btn')
	{
		if(!empty($_POST['about_text']))
		{
			$about_text = sanitize($con,$_POST['about_text']);
			$about_text_update_query = "update tbl_aboutus set au_text = '$about_text' where au_id=".$id;
			$result_u_h_t = mysqli_query($con,$about_text_update_query) or die(mysqli_error($con));
		}
		else
		{
			echo'Text for About page can not be empty.';
		}
	}


	$query = "select au_text from  tbl_aboutus where au_id=".$id;
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_fetch_assoc($result);



?>
<?php  ?>
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
					<h3>About Page CMS</h3>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<label for="about_text">Description of Washers at About-us Page:</label><br/><br/>
						<textarea class="ckeditor" name="about_text" ><?php echo $row['au_text'];?></textarea><br/>
						<button type="submit" class="button" id="update_about_text_btn" name="update_about_text_btn" value="u_a_t_btn">
							Update About Text</button>
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
