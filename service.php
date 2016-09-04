<?php
	require_once('include/init.php');
	require_once('include/functions/general_fns.php');
	require_once('include/functions/login_fns.php');

	if($_GET['action']=='get_clothes'){
		$query = 'select cl.cl_id, cl.cl_name, c.c_name from tbl_category c inner join tbl_clothes cl ON c.c_id=cl.c_id where c.c_id ='.$_GET['c_id'];
		$result=mysqli_query($con,$query) or die(mysqli_error($con));
		$cl=array();
		while($row=mysqli_fetch_assoc($result))
		{
			$cl[]=$row;
		}
		echo json_encode(array("cl"=>$cl,"c_id"=>$_GET['c_id']));
	}

	if($_GET['action']=='edit_faqs'){
		$query_edit = 'select * from tbl_faqs where f_id ='.$_GET['c_id'];
		$result_edit=mysqli_query($con,$query_edit) or die(mysqli_error($con));
		$_SESSION['update_id'] = $_GET['c_id'];
		$cl=array();
		while($row=mysqli_fetch_assoc($result_edit))
		{
			$cl[]=$row;
		}
		echo json_encode(array("cl"=>$cl,"f_id"=>$_GET['c_id']));
	}

	if($_GET['action']=="select_driver")
	{
		$query="UPDATE tbl_order SET dr_id={$_POST['dr_id']} WHERE o_id={$_POST['o_id']}";
		mysqli_query($con,$query) or die(mysqli_error($con));
		mysqli_close($con);
	}

	if($_GET['action']=="get_details"){
		$data=array();

		$query="SELECT * FROM tbl_order WHERE o_id=".$_GET['o_id'];
		$result=mysqli_query($con,$query) or die(mysqli_error($con));
		$row=mysqli_fetch_assoc($result);
		$clothes=explode(',',$row['clothes']);
		$quantities=explode(',',$row['quantities']);

		$q="SELECT c_name FROM tbl_category WHERE c_id=".$row['c_id'];
		$res=mysqli_query($con,$q);
		$r=mysqli_fetch_assoc($res);
		$data["category_name"]=$r['c_name'];
		$data["job_id"]=$row['o_id'];
		$data["amount"]=$row['amount'];

		for($i=0;$i<sizeof($clothes);$i++)
		{
			$q1="SELECT cl_name FROM tbl_clothes WHERE cl_id=".$clothes[$i];
			$res=mysqli_query($con,$q1);
			$r1=mysqli_fetch_assoc($res);
			$data["clothes"][]=$r1['cl_name'];
			$data["quantity"][]=$quantities[$i];
		}
		echo json_encode(array("data"=>$data));
	}

	function fail($msg){
		header("Content-type: application/json");
		echo json_encode(array("status"=>"fail","msg"=>$msg));
	}
?>
