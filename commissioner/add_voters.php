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

	if(isset($_REQUEST['add_voters'])){
		$fullname = addslashes($_POST['fullname']);
		$username = addslashes($_POST['username']);
		$password = sha1($_POST['password']);
		$gender = addslashes($_POST['gender']);
		$location = addslashes($_POST['location']);
		$email = addslashes($_POST['email']);
		$status = addslashes($_POST['status']);
		//image
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file($image_tmp,"images/$image");



		if ($fullname == "") {
			echo "<div class='alert alert-danger'>Full name is required</div>";
			$add = 0;
		}
		if ($username == "") {
			echo "<div class='alert alert-danger'>Username is required</div>";
			$add = 0;
		}
		$sqlu = "SELECT * FROM voters WHERE username = '$username'";
			$resu = mysqli_query($conn,$sqlu);
			$rowsu = mysqli_num_rows($resu);
			if($rowsu > 0){
				echo "<div class='alert alert-danger'>Username already exist</div>";
				$add = 0;
			}
		if ($_POST['password'] == "") {
			echo "<div class='alert alert-danger'>Password is required</div>";
			$add = 0;
		}
		if ($email== "") {
			echo "<div class='alert alert-danger'>Email is required</div>";
			$add = 0;
		}

		if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
			echo "<div class='alert alert-danger'>Invalid Email address</div>";
			$add = 0;
		}
		$sql = "SELECT * FROM voters WHERE email = '$email'";
			$res = mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($res);
			if($rows > 0){
				echo "<div class='alert alert-danger'>Email already exist</div>";
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
		if ($status == "Select a status") {
			echo "<div class='alert alert-danger'>Please select a status</div>";
			$add = 0;
		}
		/*if ($image== "") {
			echo "<div class='alert alert-danger'>Image is required</div>";
			$add = 0;
		}*/
		if($_POST['password'] != $_POST['conf_password']){
			echo "<div class='alert alert-danger'>Password does not match</div>";
			$add = 0;
		}
		if(isset($add)){
			echo "<div class='alert alert-danger'>Sorry we couldn't register that voter at the moment, try again later</div>";
		}else{
			$sql_add = "INSERT INTO voters(fullname,username,password,email,location,gender,status,image,date_reg)VALUES('$fullname','$username','$password','$email','$location','$gender','$status','$image',NOW())";
			mysqli_query($conn,$sql_add);

		/*	$to = "ajalaf4jesus@gmail.com";

			$sub ="Business matters";

			$msg = "I'm sending you this message to tell you that the schedule of our business is moving forward";

			$from ="itloaded@yahoo.com";
			//we can slso collect the above from an input field of a form.
			mail($to, $sub, $msg, $from);
*/


			$subject = "Voters Nigeria - Voter's Details";
			$message = "Your username is ".$username." and your password is ".$_POST['password']." .Thanks, Best Regards";
			$from = "ajalaf4jesus@gmail.com";
			mail($email, $subject, $message,$from);
			$status = "<div class='alert alert-success'>Voter registered successfully</div>";
		}
	}
include("views/add_voters_view.php");
//VIEW AND DELETE VOTERS
$can_view = "SELECT * FROM voters";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>VOTERS DATABASE</h3>";
echo "<table class='table responsive'>";
echo "<th>S/N</th>";
echo "<th>Name</th>";
echo "<th>Username</th>";
echo "<th>Email</th>";
echo "<th>Location</th>";
echo "<th>Gender</th>";
echo "<th>Status</th>";
echo "<th>image</th>";
echo "<th>Date Registered</th>";
echo "<th>Action(s)</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];




	echo "<tr><td>".$i."</td><td>".$resultcan['fullname']."</td><td>".$resultcan['username']."</td><td>".$resultcan['email']."</td><td>".$resultcan['location']."</td><td>".$resultcan['gender']."</td><td>".$resultcan['status']."</td><td><img src='images/".$resultcan['image']."'width ='50'height = '50'/></td><td>".date('D jS Y g.iA',strtotime($resultcan['date_reg']))."</td><td><a href='delete.php?voter_id=$id' onclick='return confirm();'>Delete</a></td></tr>";
	$i++;
}
echo "</table>";
}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("views/footer.php");
?>
