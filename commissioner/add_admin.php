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
if($role=="Super Admin"){
	if($sel_db){
		if(isset($_REQUEST['create'])){
			$username = addslashes($_POST['username']);
			$password = sha1(addslashes($_POST['password']));
			$role = addslashes($_POST['role']);

			//Validations
			if($username==""){
				echo "<div class='alert alert-danger'>Username is required </div>";
				$create = 0;
			}

			$sql = "SELECT * FROM admin WHERE username = '$username'";
			$res = mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($res);
			if($rows > 0){
				echo "<div class='alert alert-danger'>Username already exist</div>";
				$create = 0;
			}
			if($_POST['password']==""){
				echo "<div class='alert alert-danger'>Password is required</div>";
				$create = 0;
			}

			if($role == "Select a Role"){
				echo "<div class='alert alert-danger'>Please select a role</div>";
				$create = 0;
			}

			if(isset($create)){
				echo "<div class='alert alert-danger'>Sorry, we could not create an admin now. Try again Later.</div>";
			}else{
				$sql2 = "INSERT INTO admin(username,password,role) VALUES ('$username','$password','$role')";
				mysqli_query($conn,$sql2);
				$status = "<div class='alert alert-success'>An Admin has been registered successfully!</div>";
			}

		}
include("views/add_admin_view.php");
//VIEW AND DELETE ADMIN
$can_view = "SELECT * FROM admin WHERE role <> 'Super Admin'";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>ADMIN DATABASE</h3>";
echo "<table class='table'>";
echo "<th>S/N</th>";
echo "<th>Username</th>";
echo "<th>Role</th>";
echo "<th>Action(s)</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];
	echo "<tr><td>".$i."</td><td>".$resultcan['username']."</td><td>".$resultcan['role']."</td><td><a href='delete.php?admin_id=$id' onclick='return confirm();'>Delete</a></td></tr>";
	$i++;
}
echo "</table>";
}
}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("views/footer.php");
?>
