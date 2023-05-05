
<?php

if($sel_db){
//VIEW AND DELETE VOTERS

//governor
$can_viewp = "SELECT * FROM candidates WHERE position = 'governor'";
$president = mysqli_query($conn,$can_viewp);
//$resp = mysqli_query($conn,$can_viewp);

?>

<form action="" method="post" class="form-group">

  <p class="list-group-item">
    <select name="party" class="form-control">
      <?php
    //  echo "<option></option>";
      while($result = mysqli_fetch_array($president)){
      echo "

      <option value=".$result['party'].">".$result['name_of_candidate']."    (".$result['party'].") = ".$result['votes_count']."</option>
      ";
      }
      ?>
    </select>
  </p>
  <p class="list-group-item">
    <input type="submit" name="governor" value="VOTE" onclick="return confirm();" class="btn btn-success">
  </p>
</form>
<script type="text/javascript">
  function confirm(){
    alert("Make sure you have selected the party of your choice, this process can't be reverted");
  }
</script>

<?php
//governor voting
if(isset($_POST['governor'])){
$partysel =  addslashes($_POST['party']);
$party_Position = 'governor';
$checkid = "SELECT * FROM governor WHERE voter_id='$id'";
$check_exist = mysqli_query($conn,$checkid);
if(mysqli_num_rows($check_exist) >= 1){
echo "<div class='alert alert-info'>Sorry, it seems you have voted previously, you are not allowed to vote more than ONCE. Thanks, have a nice day.</div>";
}else{
  $voted = "UPDATE candidates SET votes_count = votes_count+1 WHERE position='$party_Position' AND party ='$partysel'";
  mysqli_query($conn,$voted);
  $voted_id = "INSERT INTO governor (voter_id) VALUES('$id')";
  mysqli_query($conn,$voted_id);
  echo "<div class='alert alert-success'>You have voted successfully</div>";
}
}




	$can_viewse = "SELECT * FROM startvote";
	$resse = mysqli_query($conn,$can_viewse);
	$resulte = mysqli_fetch_array($resse);

	if($resulte['end_time'] != date('Y-m-d')){
	$can_view = "SELECT * FROM candidates WHERE Position ='governor'";
	$res = mysqli_query($conn,$can_view);
	echo "<hr/>";
	echo "<h3 align='center'>CANDIDATES</h3>";
	echo "<table class='table'>";
	echo "<th>S/N</th>";
	echo "<th>Name of Candidate</th>";
	echo "<th>Position</th>";
	echo "<th>Party</th>";
  	echo "<th>image</th>";
	echo "<th>Vote Counts</th>";

	$i = 1;
	while ($resultcan = mysqli_fetch_array($res)) {
		$id = $resultcan['id'];
		echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td><img src='commissioner/images/".$resultcan['image']."'width ='50'height = '50'/></td><td>".$resultcan['votes_count']."</td></tr>";

    $i++;
	}
	echo "</table>";
	}else{
		echo "<div class='alert alert-info'>No Voting section currently on. Check Back Later.</div>";
	}

}

?>
<!-- End Contents -->
