<?php
session_start();
include('commissioner/functions/conc.php');
include("header.php");
$username = $_SESSION['VOTER'];
$id = $_SESSION['ID'];
?>
<body>
	<div class='contents'>
		<div class="content_para">
	<?php
		include("voters_menu.php");
	?>

<br><br>
	<div class="container">
	  <a href="vote.php?president"><button type="button" class="btn btn-danger">President</button></a>
		<a href="vote.php?governor"><button type="button" class="btn btn-danger">Governor</button></a>
		<a href="vote.php?national"><button type="button" class="btn btn-danger">National Assembly</button></a>
		<a href="vote.php?state"><button type="button" class="btn btn-danger">State Assembly</button></a>
	</div>



<?php
if(isset($_GET['president'])){
	include('voting/president.php');
}elseif (isset($_GET['governor'])) {
	include('voting/governor.php');
}elseif (isset($_GET['national'])) {
	include('voting/national.php');
}elseif (isset($_GET['state'])) {
	include('voting/state.php');
}
 ?>

</div>
</div>
</body>
<?php
include("footer.php");
?>
