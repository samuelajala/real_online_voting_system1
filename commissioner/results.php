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

<?php
if($sel_db){
	$sql = "SELECT * FROM party";
	$res = mysqli_query($conn,$sql);

	$sql2 = "SELECT * FROM positions";
	$res2 = mysqli_query($conn,$sql2);

	//total votes
$totalv = "SELECT SUM(votes_count) AS total_votes FROM candidates";
$total_vo = mysqli_query($conn,$totalv);
$result_total = mysqli_fetch_array($total_vo);
$total_votes = $result_total['total_votes'];
//end total votes

	//total candidate
$totalc = "SELECT * FROM candidates";
$total_co = mysqli_query($conn,$totalc);
$result_totalc = mysqli_num_rows($total_co);
//end total candidate

$can_viewse = "SELECT * FROM startvote";
$resse = mysqli_query($conn,$can_viewse);
$resulte = mysqli_fetch_array($resse);

if($resulte['end_time'] == date('Y-m-d')){
$can_view = "SELECT * FROM candidates";
$res = mysqli_query($conn,$can_view);

echo "<hr/>";
echo "<div id='div_print'>";
echo "<h3 align='center'>Voting Results</h3>";
echo "<table class='table table-info'>";
echo "<th>S/N</th>";
echo "<th>Name of Candidate</th>";
echo "<th>Position</th>";
echo "<th>Party</th>";
echo "<th>Vote Count</th>";
echo "<th>Image</th>";
echo "<th>% percentage Vote</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
	$id = $resultcan['id'];
	$votes_c = $resultcan['votes_count'];
	$bpercent = $votes_c/$total_votes;
	$percentage = $bpercent*100;

	echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td>".$resultcan['votes_count'].	"</td><td><img src='images/".$resultcan['image']."'width ='50'height = '50'/></td><td>"."</td><td> ~ ".floor($percentage)." %</td></tr>";

	$i++;
}
echo "<th>Totals: </th>";
echo "<th>".$result_totalc." Candidates</th>";
echo "<th></th>";
echo "<th></th>";
echo "<th>".$total_votes." Votes</th>";
echo "<th></th>";

echo "</table>";
echo "</div>";
?>
<p>
<input type="button" name="b_print" class="btn btn-success" onclick="printdiv('div_print');" value="Print Results">
<a href="post.php?result=posted" onclick="return confirm_post();" class="btn btn-danger">Post to the Public</a>
</p>
<?php
}
}
?>
<script type="text/javascript">
	function confirm_post(){
		alert("Are you sure you want to post the result to the public");
	}
</script>

</div>
</div>
<!-- End Contents -->
<?php
include("views/footer.php");
?>
