<?php
session_start();
include('functions/conc.php');
include("views/header.php");
$role = $_SESSION['ROLE'];
?>

<!-- Begin Contents -->
<div class='contents'>
	<div class="content_para">
<?php
	include("views/admin_menu.php");
?>

<br><br>
	<div class="container">
	  <a href="add_candidates.php?candidate"><button type="button" class="btn btn-danger">Add Candidate</button></a>
		<a href="add_candidates.php?president"><button type="button" class="btn btn-danger">President</button></a>
		<a href="add_candidates.php?governor"><button type="button" class="btn btn-danger">Governor</button></a>
		<a href="add_candidates.php?national"><button type="button" class="btn btn-danger">National House of Assembly</button></a>
		<a href="add_candidates.php?state"><button type="button" class="btn btn-danger">State House of Assembly</button></a>
	</div>


	<?php
	if(isset($_GET['candidate'])){
	include('candidates/candidate.php');
	}elseif (isset($_GET['president'])) {
		include('candidates/president.php');
	}elseif (isset($_GET['governor'])) {
		include('candidates/governor.php');
	}elseif (isset($_GET['national'])) {
		include('candidates/national.php');
	}elseif (isset($_GET['state'])) {
		include('candidates/state.php');
	}
	 ?>

</div>
</div>
<!-- End Contents -->
<?php
include("views/footer.php");
?>
