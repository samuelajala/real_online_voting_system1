<?php
session_start();
include('functions/conc.php');
include("views/header.php");
$role = $_SESSION['ROLE'];
?>

<!-- Begin Contents -->
<div class='contents'>
	<div class="content_para">
<?php
	include("views/admin_menu.php");
?>

<?php
if($sel_db){

	if(isset($_REQUEST['start'])){
		$starttime = addslashes($_POST['starttime']);
		$endtime = addslashes($_POST['endtime']);

//var_dump($starttime);
		//Validations
	if(stripos($_SERVER['HTTP_USER_AGENT'], "Chrome") == true){

		if($starttime == ""){
			echo "<div class='alert alert-danger'>Please set a start time</div>";
			$start = 0;
		}
		if($endtime == ""){
			echo "<div class='alert alert-danger'>Please set end time</div>";
			$start = 0;
		}
	}elseif(stripos($_SERVER['HTTP_USER_AGENT'], "Safari") == true){
		if($starttime == ""){
			echo "<div class='alert alert-danger'>Please set a start time</div>";
			$start = 0;
		}
		if($endtime == ""){
			echo "<div class='alert alert-danger'>Please set end time</div>";
			$start = 0;
		}
	}else{
		if($starttime == ""){
			echo "<div class='alert alert-danger'>Please set a start time</div>";
			$start = 0;
		}
		if($endtime == ""){
			echo "<div class='alert alert-danger'>Please set end time</div>";
			$start = 0;
		}
	}
	if(isset($start)){
			echo "<div class='alert alert-danger'>Sorry we couldn't start the voting system. Please try again later</div>";
	}else{
		$sql = "SELECT * FROM startvote";
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) > 0){
		$startsqlu = "UPDATE startvote SET start_time = '$starttime',end_time = '$endtime'";
		mysqli_query($conn,$startsqlu);

		$startsqlucand = "UPDATE candidates SET votes_count = '0'";
		mysqli_query($conn,$startsqlucand);

		$startsqluvotes = "DELETE FROM votes";
		mysqli_query($conn,$startsqluvotes);

		$president = "DELETE FROM president";
		mysqli_query($conn,$president);

		$governor = "DELETE FROM governor";
		mysqli_query($conn,$governor);

		$national = "DELETE FROM national_assembly";
		mysqli_query($conn,$national);

		$state = "DELETE FROM state_assembly";
		mysqli_query($conn,$state);

		$sqlp = "SELECT * FROM post";
		$respost = mysqli_query($conn,$sqlp);
		$resposted = mysqli_fetch_array($respost);

		if($resposted['status'] == 'posted'){
		$delete_post = "DELETE FROM post WHERE status = 'posted'";
		mysqli_query($conn,$delete_post);
		}
		$status = "<div class='alert alert-success'>Voting System activated successfully</div>";
		}else{
		$startsql = "INSERT INTO startvote(start_time,end_time) VALUES ('$starttime','$endtime')";
		mysqli_query($conn,$startsql);
		if($resposted['status'] == 'posted'){
		$delete_post = "DELETE FROM post WHERE status = 'posted'";
		mysqli_query($conn,$delete_post);
		}

		$status = "<div class='alert alert-success'>Voting System activated successfully</div>";
		}
	}
	}
include("views/startup_view.php");
$can_view = "SELECT * FROM startvote";
$res = mysqli_query($conn,$can_view);
$result = mysqli_fetch_array($res);
if($result['end_time'] != date('Y-m-d')){
	echo "<div class='alert alert-info'>Voting has started since ".$result['start_time']." and will end at ".$result['end_time']. " 1:00AM.</div>";
	echo "<a href='stopvote.php' class='btn btn-danger' onclick='return confirm();'>Stop Vote Now</a>";
}else{
	echo "<div class='alert alert-info'>No Voting section currently on. Start one now</div>";
}
}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("views/footer.php");
?>
