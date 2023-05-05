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
	if(isset($_REQUEST['add_party'])){
		$party = strtoupper(addslashes($_POST['party']));
		if($party == ""){
			echo "<div class='alert alert-danger'>Party is required</div>";
			$add = 0;
		}
		if(isset($add)){
			echo "<div class='alert alert-danger'>Sorry we couldn't add a party at the moment, try again later</div>";
			
		}else{
			$sql_party = "INSERT INTO party(party) VALUES('$party')";
			mysqli_query($conn,$sql_party);
			$status = "<div class='alert alert-success'>Party Added Successfully</div>";
		}
	}
include("views/add_party_view.php");
//VIEW AND DELETE PARTY
$can_view = "SELECT * FROM party";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>PARTY</h3>";
echo "<table class='table'>";
echo "<th>S/N</th>";
echo "<th>Party Alias</th>";
echo "<th>Action(s)</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];
	echo "<tr><td>".$i."</td><td>".$resultcan['party']."</td><td><a href='delete.php?party_id=$id' onclick='return confirm();'>Delete</a></td></tr>";
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