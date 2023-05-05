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
if($sel_db){
//VIEW AND DELETE VOTERS
$can_view = "SELECT * FROM voters WHERE id = '$id'";
$res = mysqli_query($conn,$can_view);
$result = mysqli_fetch_array($res);

	$session_id = 		$_SESSION['ID'];

	$image = "SELECT * FROM voters WHERE id='$session_id'";
	$run_image = mysqli_query($conn,$image);
	$vote_image=mysqli_fetch_array($run_image);


 echo "<img src='commissioner/images/".$vote_image['image']."' id='img_upload'  alt='Max Image Size 1.5MB' height='100' weight='100'>";
echo "<h3 align='justify'>".$username."'s Profile Details</h3><br/>";
echo "<p class=list-group-item>Name: ".$result['fullname']."</p>";
echo "<p class=list-group-item>Username: ".$result['username']."</p>";
echo "<p class=list-group-item>Email: ".$result['email']."</p>";
echo "<p class=list-group-item>Location: ".$result['location']."</p>";
echo "<p class=list-group-item>Gender: ".$result['gender']."</p>";
echo "<p class=list-group-item>Status: ".$result['status']."</p>";
echo "<p class=list-group-item>Date Registered: ".date('D jS Y g.ia', strtotime($result['date_reg']))."</p>";
echo "<p class=list-group-item>Last Logged in: ".date('D jS Y g.ia', strtotime($result['last_login']))."</p>";



}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("footer.php");
?>
