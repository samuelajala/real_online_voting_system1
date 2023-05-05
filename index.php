<?php
session_start();
include('commissioner/functions/conc.php');
if($sel_db){
	if(isset($_SESSION['VOTER']) == TRUE){
		header("Location:dashboard.php");
	}else{
	if(isset($_REQUEST['vote'])){
		$username = addslashes($_POST['username']);
		$password = hash("sha1",addslashes($_POST['password']));
		$logged = "SELECT * FROM voters WHERE username='$username' AND password='$password'";
		$success = mysqli_query($conn,$logged);

		if($success){

			while($rows = mysqli_fetch_array($success)){
				$_SESSION['VOTER'] = $rows['username'];
				$_SESSION['ID'] = $rows['id'];
			}

			$lastlog = "UPDATE voters SET last_login=NOW()";
			$success = mysqli_query($conn,$lastlog);
			header("Location:dashboard.php");
		}else{
			$status = "Invalid Login!";
		}
	}
}
}

include("home_view.php");
