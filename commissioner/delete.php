<?php
include('functions/conc.php');
if($sel_db){
if(isset($_GET['admin_id'])){
	$admin_id = $_GET['admin_id'];
	$sql1 = "DELETE FROM admin WHERE id = '$admin_id'";
	mysqli_query($conn,$sql1);
	header("Location:add_admin.php");
}elseif (isset($_GET['voter_id'])) {
	$voter_id = $_GET['voter_id'];
	$sql2 = "DELETE FROM voters WHERE id = '$voter_id'";
	mysqli_query($conn,$sql2);
	header("Location:add_voters.php");
}elseif (isset($_GET['party_id'])) {
	$party_id = $_GET['party_id'];
	$sql3 = "DELETE FROM party WHERE id = '$party_id'";
	mysqli_query($conn,$sql3);
	header("Location:add_party.php");
}elseif (isset($_GET['pos_id'])) {
	$pos_id = $_GET['pos_id'];
	$sql4 = "DELETE FROM positions WHERE id = '$pos_id'";
	mysqli_query($conn,$sql4);
	header("Location:add_positions.php");
}elseif (isset($_GET['cand_id'])) {
	$cand_id = $_GET['cand_id'];
	$sql5 = "DELETE FROM candidates WHERE id = '$cand_id'";
	mysqli_query($conn,$sql5);
	header("Location:add_candidates.php");
}
}