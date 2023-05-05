<?php
//VIEW AND DELETE CANDIDATES
$can_view = "SELECT * FROM candidates WHERE position = 'Governor'";
$res = mysqli_query($conn,$can_view);
echo "<hr/>";
echo "<h3 align='center'>CANDIDATES</h3>";
echo "<table class='table'>";
echo "<th>S/N</th>";
echo "<th>Name of Candidate</th>";
echo "<th>Position</th>";
echo "<th>Party</th>";
echo "<th>Vote Count</th>";
echo "image";
echo "<th>Action(s)</th>";
$i = 1;
while ($resultcan = mysqli_fetch_array($res)) {
  $id = $resultcan['id'];
  echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td>".$resultcan['votes_count']."</td><td><img src='images/".$resultcan['image']."'width ='50'height = '50'/></td><td>"."</td><td><a href='delete.php?cand_id=$id' onclick='return confirm();'>Delete</a></td></tr>";
  $i++;
}
echo "</table>";

?>
