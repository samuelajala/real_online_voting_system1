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

include("forgot_view.php");
}
?>
</div>
</div>
<!-- End Contents -->
<?php
include("footer.php");
?>
