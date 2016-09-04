<?php
	require_once('../include/init.php');
	require_once('../include/functions/general_fns.php');
	require_once('../include/functions/login_fns.php');

	if(!isLoggedIn())
	{
		mysqli_close($con);
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../index.php");
		exit();
	}
	
	$que_update = $ans_update =	$que = $ans = "";
	
	
	if(isset($_POST['save_ans_btn']) && !empty($_POST['save_ans_btn']) &&  $_POST['save_ans_btn'] === 'save ans')
	{
		$que = sanitize($con,$_POST['question']);
		$ans = sanitize($con,$_POST['answer']);
		
		if(!empty($que) && !empty($ans))
		{
			$query = "insert into tbl_faqs (f_ques,f_ans) values ('$que','$ans')";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			
			if($result)
			{
				//echo'Your FAQs has been recorded.';
				$ans = $que = '';
			}
		}
		else
		{
			echo 'Both fields are required!!!';
		}
	}
	
	
	if(isset($_GET['del']) && !empty($_GET['del']))
	{
		$del_id = $_GET['del'];
				
		$del_query = "delete from tbl_faqs where f_id =".$del_id;
		$result_del = mysqli_query($con,$del_query) or die(mysqli_error($con));
		
		if($result_del)
		{
			header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/faqs.php");
		}
	}
	
	if(isset($_GET['edit']) && !empty($_GET['edit']))
	{
		$edit_id = $_GET['edit'];
		
		
	}
	
	if(isset($_POST['update_btn']) && !empty($_POST['update_btn']) &&  $_POST['update_btn']=== 'update ans')
	{
		//echo'Update button clicked.';
		$edit_id = $_SESSION['update_id'];
		$update_que = $_POST['update_question'];
		$update_ans = $_POST['update_answer'];
		
		if(!empty($_POST['update_question']) && !empty($_POST['update_answer']) )
		{
			$update_query = "update tbl_faqs set f_ques = '$update_que', f_ans = '$update_ans' where f_id = ".$edit_id;
			$update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));
		}
		else
		{
			echo'Question and Answer both are required.';
		}
	}
	
	
	
	
?>
<!doctype html public>
<html>
	<head>
		<title>FAQs</title>
		<?php include_once('../entities/icon_title_bar.html');?>
		<link href="../css/admin.css" rel="stylesheet" type="text/css">
		<link href="<?php echo $siteroot; ?>/css/magnific-popup.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="body-content">
				<h3>FAQs</h3>
				<hr />
				<div id="faqs">
					<div id="content">
						<div id="form_faqs">
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
								<label for="question">Question</label>&nbsp;*<br/>
								<input type="text" name="question" id="question" size="65" value="<?php echo $que;?>" /><br/>
								<label for="answer">Answer</label>&nbsp;*<br/>
								<textarea  name="answer" id="answer" cols="50"/><?php echo $ans;?></textarea><br/>
								<button name="save_ans_btn" id="save_ans_btn" class="button" value="save ans">Save Answer</button>
							</form>
						</div>
						
						<div class="clear"></div>
						<hr />
						
						<div id="FAQsTab" class="FAQs">
							<table class="responstable">
							<?php
								$query="SELECT * FROM tbl_faqs ";
								$result=mysqli_query($con,$query);
								if(mysqli_num_rows($result)!=0)
								{
							?>
							<tr>
								<th>Que No</th>
								<th>Question </th>
								<th>Answer</th>
								<th>DELETE?</th>
								<th>EDIT?</th>
							  </tr>
							<?php

								while($row=mysqli_fetch_array($result))
								{
									echo '<tr>';
									echo '<td>'.$row['f_id'].'</td>';
									echo '<td>'.$row['f_ques'].'</td>';
									echo '<td>'.$row['f_ans'].'</td>';
									echo	'<td>
														<button name="del_btn" id="del_btn" value="delete_record" class ="button" onclick="del_faqs('.$row["f_id"].')">Delete</button>
													
											</td>';
									echo	'<td>
														<button name="edit_btn" id="'.$row["f_id"].'" value="edit_record" class ="button popup">Edit</button>
													
											</td>';		
									echo '</tr>';
								}
								}else{
									echo "<p class=\"error\">NO DATA FOUND</p>";
								}

							?>
							</table>
						</div>
									<div id="popup-window" class="white-popup mfp-hide pop_wrapper">
										<div class="mfp-container mfp-s-ready mfp-inline-holder">
											<div id="popup-content" class="white-popup popup_wrapper">
												<h2>Edit FAQ </h2>
												<form id="edit_faq_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
													<label for="question">Question</label>&nbsp;*<br/>
													<input type="text" name="update_question" id="update_que" size="65"  /><br/>
													<label for="answer">Answer</label>&nbsp;*<br/>
													<textarea  name="update_answer" id="update_ans" cols="75" rows="5"/></textarea><br/>
													<button name="update_btn" id="update_btn" class="button" value="update ans">Update Record</button>
												</form>
											</div>
										</div>
									</div>
					</div>
				</div>	
			</div>
			<hr/>
			<footer>
				<a href="logout.php">LOGOUT</a>
			</footer>
		</div>

	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/tabpanel.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script>
		function del_faqs(del_id)
		{
			var $flag = confirm('Are you sure , you want to delete FAQs no '+del_id);
			
			if($flag)
			{
				//console.log('delete record');
				window.location="<?php echo $_SERVER['PHP_SELF']?>"+"?del="+del_id;
			}
			else
			{
				//console.log('cancle delete record');
			}
		}
		
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
				var c_id = $(this).attr("id");
				console.log('popup clicked');
				
				
				$.getJSON("../service.php?action=edit_faqs&c_id="+c_id,function(JSON){

					if(JSON.status=="fail"){
						window.location.href="http://localhost/washers/extras/log_in.php";
						return false;
					}
					
					var updated_que = JSON.cl[0].f_ques;
					var updated_ans = JSON.cl[0].f_ans;
						
						$('#update_que').val(updated_que);
						$('#update_ans').val(updated_ans);
					
				}); 
			});
			
			
		});
	</script>
	</body>
</html>
