<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	require_once('../include/functions/home_fns.php');
	
	//print_r($_SESSION);
	if(isset($_POST['SUBMIT'])){
		$_SESSION['bucket']=Array();
		foreach($_POST as $key=>$value){
			if(is_numeric($key)&&!empty($value))
				$_SESSION['bucket'][$key]=$value;			
		}
		//print_r($_SESSION);
		mysqli_close($con);
		header("Location: ../content/select_seller.php");
		exit;
	}
	
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
					echo "<div id=\"{$row['c_id']}\" class=\"popup popup01\"><div class=\"img\"><img src=\"../images/{$row['c_image']}\"></div>{$row['c_name']}</div>";
					}
					else
					{
						echo "<div id=\"{$row['c_id']}\" class=\"popup\"><div class=\"img\"><img src=\"../images/{$row['c_image']}\"></div>{$row['c_name']}</div>";
						
					}
					
				}
			?>
				<!--
				<div id="sl" class="popup"><div class="img"><img src="../images/suede.png"></div>Suede and Leather</div>
				<div id="dry" class="popup"><div class="img"><img src="../images/dry_clean_icon.png"></div>Dry Cleaning Service</div>
				<div id="shirt" class="popup"><div class="img"><img src="../images/shirt.png"></div>Shirt Laundry</div>
				<div id="ra" class="popup"><div class="img"><img src="../images/icon2.png"></div>Repair and Alteration</div>
				<div id="hdc" class="popup"><div class="img"><img src="../images/household_icon.png"></div>Household Dry Cleaning</div>-->
			</div>
			<div class="clear"></div>
			<div id="popup-window" class="white-popup mfp-hide">
				<h2>Dry Cleaning Service</h2>
				<div class="popup-content">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					
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
			<!--<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa.
				Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui
				Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa.
				Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui.
				Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa.
				Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui.
				Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit.
			</p>
			-->
			<p><?php echo $row1['h_text'];?></p>
			<h1>Tags</h1>
			
			
			<!--Tags Dynamicly....-->
			
			
			<ul id="tags">
				<a href="#" name=""><li>Lorem</li></a>
				<a href="#" name=""><li>ipsum</li></a>
				<a href="#" name=""><li>dolor</li></a>
				<a href="#" name=""><li>sit</li></a>
				<a href="#" name=""><li>amet</li></a>
				<a href="#" name=""><li>consectetuer</li></a>
				<a href="#" name=""><li>adipiscing</li></a>
				<a href="#" name=""><li>elit</li></a>
				<a href="#" name=""><li>Nunc</li></a>
				<a href="#" name=""><li>varius</li></a>
				<a href="#" name=""><li>facilisis</li></a>
				<a href="#" name=""><li>eros</li></a>
				<a href="#" name=""><li>Integer</li></a>
				<a href="#" name=""><li>purus</li></a>
				<a href="#" name=""><li>augue</li></a>
				<a href="#" name=""><li>commodo</li></a>
				<a href="#" name=""><li>Lorem</li></a>
				<a href="#" name=""><li>ipsum</li></a>
				<a href="#" name=""><li>dolor</li></a>
				<a href="#" name=""><li>sit</li></a>
				<a href="#" name=""><li>amet</li></a>
				<a href="#" name=""><li>consectetuer</li></a>
				<a href="#" name=""><li>adipiscing</li></a>
				<a href="#" name=""><li>elit</li></a>
				<a href="#" name=""><li>Nunc</li></a>
				<a href="#" name=""><li>varius</li></a>
				<a href="#" name=""><li>facilisis</li></a>
				<a href="#" name=""><li>eros</li></a>
				<a href="#" name=""><li>Integer</li> </a>
				<a href="#" name=""><li>purus</li></a>
				<a href="#" name=""><li>augue</li></a>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
<?php
	require_once('../entities/footer.php');
?>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function(){

	$('.popup').magnificPopup({
	  items: {
		  src: '#popup-window',
		  type: 'inline',
	  },
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});
	
	$('.popup').click(function(){
		var cat_id = $(this).attr("id");
		$.getJSON("../service.php?action=get_clothes&cat_id="+cat_id,function(JSON){
			
			if(JSON.status=="fail"){
				window.location.href="http://localhost/washers/extras/log_in.php";
				return false;
			}
			$("#popup-window h2").html(JSON.cl[0].c_name);
			$table_start = "<table  cell-spacing=\"10\">";
			$table_row_start = "<tr>";
			$row = "<th>Category</th><th>Qty</th>";
			$table_row_end = "</tr>";
			$table_end = "</table><br>";
			$table_struct = $table_start + $table_row_start + $row + $table_row_end + $table_end;
			$(".popup-content form").html($table_struct);
			$.each(JSON.cl,function(){
				$label = "<tr><td><label>"+this.cl_name+"</label></td>";
				$textbox = "<td><input type='text' id='"+this.cl_id+"' name='"+this.cl_id+"' maxlength='3'></td></tr>";
				$(".popup-content form table").append($label + $textbox);
			});
			$(".popup-content form").append("<button type=\"submit\" value=\"Next\" id=\"next_button\" name=\"SUBMIT\">Next</button>");				
		});
	});
});
</script>
</body>
</html>
<?php

	/* Dynamicly Tags
		<?php
				$status = 1;
				$query2 ="select t_name,	t_link from tbl_tags where isActive =".$status;
				$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
				
				while($row2 = mysqli_fetch_assoc($result2))
				{
			?>
			<ul id = "tags">
				<a href="<?php echo $row2['t_link']?>" name=""><li><?php echo $row2['t_name']?></li></a>
			</ul>
				<?php
				}?>
	*/

?>