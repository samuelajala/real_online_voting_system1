<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "voting_system";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die("Could not connect".mysqli_error());
$sel_db = mysqli_select_db($conn,$db);