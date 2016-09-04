<?php
    require_once('../include/init.php');
    require_once('../include/functions/general_fns.php');
    require_once('../include/functions/login_fns.php');

    if(!isAdminLoggedIn())
    {
        mysqli_close($con);
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../index.php");
        exit();
    }
    $_SESSION['title']="Admin | FAQs-CMS";
    require_once("header.php");

    $que_update = $ans_update =	$que = $ans = "";
    $errors=array();
    if(isset($_POST['SUBMIT']))
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
                $errors[]="<div class=\"alert alert-success\">New FAQ has been recorded</div>";
				$ans = $que = '';
			}
		}
		else
		{
            $errors[]="<div class=\"alert alert-warning\">Both fields are required!!!</div>";
		}
	}


	if(isset($_GET['del']) && !empty($_GET['del']))
	{
		$del_id = $_GET['del'];

		$del_query = "delete from tbl_faqs where f_id =".$del_id;
		$result_del = mysqli_query($con,$del_query) or die(mysqli_error($con));

		if($result_del)
		{
            mysqli_close($con);
			header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/faqs_cms.php");
            exit();
		}
	}

	if(isset($_GET['edit']) && !empty($_GET['edit']))
	{
		$edit_id = $_GET['edit'];
	}

	if(isset($_POST['update_btn']))
	{
		//echo'Update button clicked
		$edit_id = $_POST['update_id'];
		$update_que = $_POST['update_question'];
		$update_ans = $_POST['update_answer'];

		if(!empty($_POST['update_question']) && !empty($_POST['update_answer']) )
		{
			$update_query = "update tbl_faqs set f_ques = '$update_que', f_ans = '$update_ans' where f_id = ".$edit_id;
			$update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));
            $errors[]="<div class=\"alert alert-success\">FAQ updated.</div>";
		}
		else
		{
            $errors[]="<div class=\"alert alert-warning\">Question and Answer both are required.</div>";
		}
	}
?>
<div id="wrapper">
	<?php require_once("navigation.php"); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		    <div class="banner">
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>FAQs CMS</span>
				</h2>
		    </div>

		<div class="content-top">
			<div class=" col-md-12 ">
                <?php
                    foreach($errors as $error) {
                        echo $error;
                    }
                ?>
            	<div class="grid-form1">
				<h3 id="forms-horizontal">FAQs CMS</h3>
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				  <div class="form-group">
				    <label for="question" class="col-sm-2 control-label hor-form">Question</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="question" name="question" value="<?php echo $que; ?>" placeholder="Enter New Question">
				    </div>
				  </div>
				  <div class="form-group">
					  <label for="answer" class="col-sm-2 control-label">Answer</label>
					  <div class="col-sm-8"><textarea name="answer" id="answer" name="answer" cols="30" rows="4" class="form-control1" placeholder="Enter Answer"><?php echo $ans; ?></textarea></div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" name="SUBMIT" class="btn btn-default">Add Question</button>
				    </div>
				  </div>
				</form>
				</div>
			</div>
        <div class="content-bottom">
            <div class=" col-md-12 ">
                <div class="grid-form1">
                    <table>
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
                            echo '<td class="id">'.$row['f_id'].'</td>';
                            echo '<td class="que">'.$row['f_ques'].'</td>';
                            echo '<td class="ans">'.$row['f_ans'].'</td>';
                            echo	'<td>
                                        <button name="del_btn" value="delete_record" class="btn btn-danger del_btn" onclick="del_faqs('.$row["f_id"].')">Delete</button>
                                    </td>';
                            echo	'<td>
                                        <button name="edit_btn" id="'.$row["f_id"].'" value="edit_record" class ="popup btn btn-primary edit_btn" data-toggle="modal" data-target="#myModal">Edit</button>
                                    </td>';
                            echo '</tr>';
                        }
                        }else{
                            echo "<p class=\"error\">NO DATA FOUND</p>";
                        }
                    ?>
                    </table>
                </div>
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h2 class="modal-title">Edit FAQ</h2>
                       </div>
                       <div class="modal-body">
                        <div class="grid-form1">
           				<form class="form-horizontal" id="edit_faq_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
           				  <div class="form-group">
           				    <label for="update_question" class="col-sm-2 control-label hor-form">Question</label>
           				    <div class="col-sm-10">
           				      <input type="text" class="form-control" id="update_question" name="update_question">
                              <input type="hidden" name="update_id" id="update_id" value="">
           				    </div>
           				  </div>
           				  <div class="form-group">
           					  <label for="update_answer" class="col-sm-2 control-label">Answer</label>
           					  <div class="col-sm-8"><textarea name="update_answer" id="update_answer" cols="30" rows="4" class="form-control1" placeholder="Enter Answer"><?php echo $ans; ?></textarea></div>
           				  </div>
           				  <div class="form-group">
           				    <div class="col-sm-offset-2 col-sm-10">
           				      <button type="submit" name="update_btn" id="update_btn" class="btn btn-default">Update FAQ</button>
           				    </div>
           				  </div>
           				</form>
           				</div>
<!---->
<!--scrolling js-->
<?php
    require_once("footer.php")
?>
<script type="text/javascript">
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
        $(".edit_btn").click(function(){
            $("#update_question").val($(this).parent().siblings().filter(".que").text());
            $("#update_answer").text($(this).parent().siblings().filter(".ans").text());
            $("#update_id").val($(this).parent().siblings().filter(".id").text());
        });
    });
</script>
</body>
</html>
