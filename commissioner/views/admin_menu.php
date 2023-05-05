<?php
$username = $_SESSION['USERNAME'];
$role = $_SESSION['ROLE'];
if(isset($_SESSION['USERNAME']) == FALSE){
		header("Location:index.php");
	}else{
		if($role=="Super Admin"){
		echo "Welcome, ". $username. " [".$role."] | <a href='logout.php'>Logout</a>";
		echo "<hr/>";
		echo "<div class='admin_menu'>";
		echo "<a href='add_admin.php'>Add Admin</a>";
		echo " | ";
		echo "<a href='add_voters.php'>Add Voters</a>";
		echo " | ";
		echo "<a href='add_party.php'>Add Party</a>";
		echo " | ";
		//echo "<a href='add_positions.php'>Add Position</a>";
		echo " | ";
		echo "<a href='add_candidates.php'>Add Candidates</a>";
		echo " | ";
		echo "<a href='add_startup.php'>Start Vote</a>";
		echo " | ";
		echo "<a href='results.php'>See Results</a>";
		echo "</div>";
	}else{
		echo "Welcome, ". $username. " [".$role."] | <a href='logout.php'>Logout</a>";
		echo "<hr/>";
		echo "<div class='admin_menu'>";
		echo "<a href='add_voters.php'>Add Voters</a>";
		echo " | ";
		echo "<a href='add_party.php'>Add Party</a>";
		echo " | ";
	//	echo "<a href='add_positions.php'>Add Position</a>";
		echo " | ";
		echo "<a href='add_candidates.php'>Add Candidates</a>";
		echo " | ";
		echo "<a href='add_startup.php'>Start Vote</a>";
		echo " | ";
		echo "<a href='results.php'>See Results</a>";
		echo "</div>";

	}
	}

?>
