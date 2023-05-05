<?php
session_start();
include('commissioner/functions/conc.php');
include("header.php");
$username = $_SESSION['VOTER'];
$id = $_SESSION['ID'];

?>

<!-- Begin Contents -->
<div class='contents'>
	<div class="content_para">
<?php
	include("voters_menu.php");
?>

<?php
if($sel_db){
//VIEW AND DELETE VOTERS
$can_view = "SELECT * FROM voters WHERE id = '$id'";
$res = mysqli_query($conn,$can_view);
$result = mysqli_fetch_array($res);

if(isset($_REQUEST['edit'])){
	$fullname = addslashes($_POST['fullname']);
	$gender = addslashes($_POST['gender']);
	$location = addslashes($_POST['location']);

		if ($fullname == "") {
			echo "<div class='alert alert-danger'>Full name is required</div>";
			$add = 0;
		}

		if ($location== "") {
			echo "<div class='alert alert-danger'>Location is required</div>";
			$add = 0;
		}
		if ($gender == "Select a gender") {
			echo "<div class='alert alert-danger'>Please select a gender</div>";
			$add = 0;
		}

		if(isset($add)){
			echo "<div class='alert alert-danger'>Sorry we couldn't update your record at the moment, try again later</div>";
		}else{
			$sql_add = "UPDATE voters SET fullname = '$fullname',location = '$location',gender='$gender' WHERE id='$id'";
			mysqli_query($conn,$sql_add);
			$status = "<div class='alert alert-success'>Record updated successfully</div>";
			header("Location:edit_profile.php");
		}
}
include("edit_profile_view.php");
}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("footer.php");
?>
