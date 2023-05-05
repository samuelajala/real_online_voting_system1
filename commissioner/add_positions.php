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
	if(isset($_REQUEST['add_pos'])){
		
		$position = ucwords(addslashes($_POST['position']));
		if($position == ""){
			echo "<div class='alert alert-danger'>Position is required</div>";
			$add = 0;
		}
		if(isset($add)){
			echo "<div class='alert alert-danger'>Sorry we couldn't add a position at the moment, try again later</div>";
			
		}else{
			$sql_party = "INSERT INTO positions(position) VALUES('$position')";
			mysqli_query($conn,$sql_party);
			$status = "<div class='alert alert-success'>Position Added Successfully</div>";
		}
	}
include("views/add_positions_view.php");
//VIEW AND DELETE POSITIONS
$can_view = "SELECT * FROM positions";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>POSITIONS</h3>";
echo "<table class='table'>";
echo "<th>S/N</th>";
echo "<th>Positions</th>";
echo "<th>Action(s)</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];
	echo "<tr><td>".$i."</td><td>".$resultcan['position']."</td><td><a href='delete.php?pos_id=$id' onclick='return confirm();'>Delete</a></td></tr>";
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