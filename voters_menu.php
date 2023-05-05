<?php
$username = $_SESSION['VOTER'];
if(isset($_SESSION['VOTER']) == FALSE){
		header("Location:index.php");
	}else{
		echo "Welcome, <a href='dashboard.php'>$username</a>  | <a href='logout.php'>Logout</a>";
		echo "<hr/>";
		echo "<div class='admin_menu2'>";
		echo "<a href='profile.php'>Profile</a>";
		echo " | ";
		echo "<a href='edit_profile.php'>Edit Profile</a>";
		echo " | ";
		echo "<a href='vote.php'>Cast your Vote</a>";
		echo "</div>";
	}

?>
