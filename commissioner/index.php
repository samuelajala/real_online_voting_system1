<?php
session_start();
include('functions/conc.php');
if($sel_db){
	if(isset($_SESSION['USERNAME']) == TRUE){
		header("Location:admin.php");
	}else{
	if(isset($_REQUEST['login'])){
		/*
		$username = addslashes($_POST['username']);
		$password = hash("sha1",addslashes($_POST['password']));
		*/

		$username = $_POST['username'];
		$password = $_POST['password'];

		$logged = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$success = mysqli_query($conn,$logged);

		if($success){

			while($rows = mysqli_fetch_array($success)){
				$_SESSION['USERNAME'] = $rows['username'];
				$_SESSION['ROLE'] = $rows['role'];
			}
			header("Location:admin.php");
		}else{
			$status = "Invalid Login!";
		}
	}
}
}

include("views/home_view.php");
