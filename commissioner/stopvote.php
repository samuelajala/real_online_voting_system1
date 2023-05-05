<?php
include('functions/conc.php');
if($sel_db){
	$endtime = date('Y-m-d');
$startsqlu = "UPDATE startvote SET end_time = '$endtime'";
		mysqli_query($conn,$startsqlu);
		header("Location:add_startup.php");
}