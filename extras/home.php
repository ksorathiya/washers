<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	$_SESSION['title']="Washers - Home";

	if(isset($_POST['SUBMIT'])){
		$_SESSION['bucket']=Array();
		foreach($_POST as $key=>$value){
			if(is_numeric($key)&&!empty($value))
				$_SESSION['bucket'][$key]=$value;
		}
		$_SESSION['c_id']=$_POST['c_id'];
		mysqli_close($con);
		header("Location: ../content/select_seller.php");
		exit;
	}
?>
<?php
	require_once('../entities/header.php');
?>
	<div class="banner_wrapper">
		<?php
			require_once('../entities/index_banner.php');
		?>
	</div>
<div class="index_main">
		<div class="wrapper our_catigory" id="our_category">
			<h1>Our Category</h1>
			<div id="category">
			<?php
				$query="SELECT c_id,c_name,c_image FROM tbl_category";
				$result=mysqli_query($con,$query) or die(mysqli_error($con));

				while($row=mysqli_fetch_assoc($result)){
					if($row['c_id']==10 || $row['c_id']==11)
					{
			?>
						<div id="<?php echo $row['c_id'];?>" class="popup popup_wrapper">
							<div class="img"><img src="../images/<?php echo $row['c_image'];?>" title="<?php echo $row['c_name']; ?>" >
							</div><?php echo $row['c_name']; ?>
						</div>
			<?php
					}
					else
					{
			?>
						<div id="<?php echo $row['c_id'];?>" class="popup popup_wrapper">
							<div class="img"><img src="../images/<?php echo $row['c_image'];?>">
							</div><?php echo $row['c_name']; ?>
						</div>
			<?php
					}
				}
			?>
			</div>
			<div class="clear"></div>
			<div id="popup-window" class="white-popup mfp-hide">
				<h2>Login Required</h2>
				<div class="popup-content">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
						<h4 class="error_msg">You must LOG-IN/SIGN-UP first in order to place the order!!! </h4>
						<input type="hidden" name="not_logged_in" value="true">
						<button type="submit" name="SUBMIT" id="not_logged_in_button">Log-In / Sign-Up NOW</button>
					</form>
				</div>
			</div>
			<h1>Welcome to <span id="company">Washers</span></h1>
			<?php
				$id = 1;
				$query1 = "select h_text from  tbl_home where h_id=".$id;
				$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
				$row1 = mysqli_fetch_assoc($result1);
			?>
			<p><?php echo $row1['h_text'];?></p>
			<h1>Tags</h1>
			<ul id="tags">
				<?php
					$query="SELECT * FROM tbl_tags";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_assoc($result))
					{
						echo "<li><a href=\"{$row['t_link']}\" title=".$row['t_name']." name=\"\">{$row['t_name']}</a></li>";
					}
				?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
	mysqli_close($con);
?>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash;
	    var $target = $(target);
	    $("body , html").stop(true,true).animate({
	        scrollTop: $target.offset().top
	    }, 900, 'swing', function(){
	        window.location.hash = target;
	    });
	});

	var popup=$('.popup').magnificPopup({
	  items: {
		  src: '#popup-window',
		  type: 'inline',
	  },
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});
<?php
	if(isLoggedIn())
	{
?>
	$('.popup').click(function(){
		var c_id = $(this).attr("id");

		$.getJSON("../service.php?action=get_clothes&c_id="+c_id,function(JSON){
			if(JSON.status=="fail"){
				window.location.href="http://localhost/washers/extras/log_in.php";
				return false;
			}

			$("#popup-window h2").html(JSON.cl[0].c_name);
			$len=$(JSON.cl).length;
			$table_start = "<table cell-spacing=\"10\" class=\"table1\">";
			$table_row_start = "<tr>";
			$row = "<th>Category</th><th>Qty</th>";
			$table_row_end = "</tr>";
			$table_end = "</table>";
			$table_struct1 = $table_start + $table_row_start + $row + $table_row_end + $table_end;
			$table_start = "<table cell-spacing=\"10\" class=\"table2\">";
			$table_struct2 = $table_start + $table_row_start + $row + $table_row_end + $table_end;
			if($len<=10)
				$(".popup-content form").html($table_struct1);
			else
				$(".popup-content form").html($table_struct1+$table_struct2);
			$.each(JSON.cl,function(k){
				$label = "<tr><td><label>"+this.cl_name+"</label></td>";
				$textbox = "<td><input type='text' id='"+this.cl_id+"' name='"+this.cl_id+"' maxlength='3'></td></tr>";
				if(k<=10){
					$(".popup-content form table.table1").append($label + $textbox);
				}else{
					$(".popup-content form table.table2").append($label + $textbox);
				}
			});
			$(".popup-content form").append("<div class=\"clear\"></div>");
			$(".popup-content form").append("<input type=\"hidden\" name=\"c_id\" value=\""+JSON.c_id+"\">");
			$(".popup-content form").append("<button type=\"submit\" value=\"Next\" id=\"next_button\" name=\"SUBMIT\">Next</button>");
		});
	});
	<?php }else{ ?>
		$('.popup').click(function(){
			$(".popup-content form").attr("action","../index.php");
		});
	<?php } ?>
});
</script>
</body>
</html>
<?php

	
