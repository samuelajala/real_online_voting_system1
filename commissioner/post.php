<?php
session_start();
include('functions/conc.php');

if($sel_db){
	if(isset($_GET['result'])){
		$status = $_GET['result'];
		$check = "SELECT * FROM post";
		$checkd = mysqli_query($conn, $check);
		if(mysqli_num_rows($checkd) > 0){
			$up_post = "UPDATE post SET status = '$status',date = NOW()";
			mysqli_query($conn,$up_post);
			header("Location:results.php");
		}else{
		$post = "INSERT INTO post(status,date) VALUES('$status',Now())";
		mysqli_query($conn,$post);
		header("Location:results.php");
	}
	
}
}
?>
