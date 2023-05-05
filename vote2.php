<?php
session_start();
include('commissioner/functions/conc.php');
include("header.php");
$username = $_SESSION['VOTER'];
$id = $_SESSION['ID'];

?>












<!-- Begin Contents -->
<div class='contents'>
	<div class="content_para">
<?php
	include("voters_menu.php");
?>

<?php
/*
if($sel_db){
//VIEW AND DELETE VOTERS

//president
$can_viewp = "SELECT * FROM candidates WHERE position = 'president'";
$president = mysqli_query($conn,$can_viewp);
//$resp = mysqli_query($conn,$can_viewp);

//Governor
$can_viewp = "SELECT * FROM candidates WHERE position = 'governor'";
$governor = mysqli_query($conn,$can_viewp);

//national Assembly
$can_viewp = "SELECT * FROM candidates WHERE position = 'national assembly'";
$national = mysqli_query($conn,$can_viewp);


//state Assembly
$can_viewp = "SELECT * FROM candidates WHERE position = 'state assembly'";
$state = mysqli_query($conn,$can_viewp);

/*
//president voting

	if(isset($_REQUEST['president'])){
	$partysel =  addslashes($_POST['party']);
	$party_Position = 'president';
	$checkid = "SELECT * FROM votes WHERE voter_id='$id' AND position='$party_Position'";
	$check_exist = mysqli_query($conn,$checkid);
	if(mysqli_num_rows($check_exist) > 0){
		$status = "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
	}elseif(mysqli_num_rows($check_exist) < 0){
		$voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE position='$party_Position' AND party ='$partysel'";
		mysqli_query($conn,$voted);
		$voted_id = "INSERT INTO votes (voter_id,position) VALUES('$id','$party_Position')";
		mysqli_query($conn,$voted_id);
		$status = "<div class='alert alert-success'>You have voted successfully</div>";
	}
	}



	//governor voting

		if(isset($_REQUEST['governor'])){
		$partysel =  addslashes($_POST['party']);
		$party_Position = 'governor';
		$checkid = "SELECT * FROM votes WHERE voter_id='$id' AND position='$party_Position'";
		$check_exist = mysqli_query($conn,$checkid);
		if(mysqli_num_rows($check_exist) == 1){
			$status = "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
		}else{
			$voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE position='$party_Position' AND party ='$partysel'";
			mysqli_query($conn,$voted);
			$voted_id = "INSERT INTO votes(voter_id,position) VALUES('$id','$party_Position')";
			mysqli_query($conn,$voted_id);
			$status = "<div class='alert alert-success'>You have voted successfully</div>";
		}
}

		//national assembly voting

			if(isset($_REQUEST['national'])){
				$partysel =  addslashes($_POST['party']);
				$party_Position = 'national assembly';
				$checkid = "SELECT * FROM votes WHERE voter_id='$id' AND position='$party_Position'";
				$check_exist = mysqli_query($conn,$checkid);
				if(mysqli_num_rows($check_exist) == 1){
					$status = "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
				}else{
					$voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE position='$party_Position' AND party ='$partysel'";
					mysqli_query($conn,$voted);
					$voted_id = "INSERT INTO votes(voter_id,position) VALUES('$id','$party_Position')";
					mysqli_query($conn,$voted_id);
					$status = "<div class='alert alert-success'>You have voted successfully</div>";
			}
			}


			//state voting

				if(isset($_REQUEST['state'])){
					$partysel =  addslashes($_POST['party']);
					$party_Position = 'state assembly';
					$checkid = "SELECT * FROM votes WHERE voter_id='$id' AND position='$party_Position'";
					$check_exist = mysqli_query($conn,$checkid);
					if(mysqli_num_rows($check_exist) == 1){
						$status = "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
					}else{
						$voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE position='$party_Position' AND party ='$partysel'";
						mysqli_query($conn,$voted);
						$voted_id = "INSERT INTO votes(voter_id,position) VALUES('$id','$party_Position')";
						mysqli_query($conn,$voted_id);
						$status = "<div class='alert alert-success'>You have voted successfully</div>";
				}
				}


	$can_viewse = "SELECT * FROM startvote";
	$resse = mysqli_query($conn,$can_viewse);
	$resulte = mysqli_fetch_array($resse);

	if($resulte['end_time'] != date('Y-m-d')){
	include("vote_view.php");
	$can_view = "SELECT * FROM candidates";
	$res = mysqli_query($conn,$can_view);
	echo "<hr/>";
	echo "<h3 align='center'>CANDIDATES</h3>";
	echo "<table class='table'>";
	echo "<th>S/N</th>";
	echo "<th>Name of Candidate</th>";
	echo "<th>Position</th>";
	echo "<th>Party</th>";
	echo "<th>Vote Counts</th>";
	$i = 1;
	while ($resultcan = mysqli_fetch_array($res)) {
		$id = $resultcan['id'];
		echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td>".$resultcan['votes_count']."</td></tr>";
		$i++;
	}
	echo "</table>";
	}else{
		echo "<div class='alert alert-info'>No Voting section currently on. Check Back Later.</div>";
	}







if(isset($_REQUEST['vote'])){
$partysel =  addslashes($_POST['party']);
$checkid = "SELECT * FROM votes WHERE voter_id='$id'";
$check_exist = mysqli_query($conn,$checkid);
if(mysqli_num_rows($check_exist) > 0){
	$status = "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
}else{
	$voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE party ='$partysel'";
	mysqli_query($conn,$voted);
	$voted_id = "INSERT INTO votes(voter_id) VALUES('$id')";
	mysqli_query($conn,$voted_id);
	$status = "<div class='alert alert-success'>You have voted successfully</div>";
}
}
$can_viewse = "SELECT * FROM startvote";
$resse = mysqli_query($conn,$can_viewse);
$resulte = mysqli_fetch_array($resse);

if($resulte['end_time'] != date('Y-m-d')){
include("vote_view.php");
$can_view = "SELECT * FROM candidates";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>CANDIDATES</h3>";
echo "<table class='table'>";
echo "<th>S/N</th>";
echo "<th>Name of Candidate</th>";
echo "<th>Position</th>";
echo "<th>Party</th>";
echo "<th>Vote Counts</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];
	echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td>".$resultcan['votes_count']."</td></tr>";
	$i++;
}
echo "</table>";
}else{
	echo "<div class='alert alert-info'>No Voting section currently on. Check Back Later.</div>";
}



}
*/
?>
</div>
</div>
<!-- End Contents -->
<?php
include("footer.php");
?>
