
<?php
include("header.php");
 ?>
<div id="background_no_repeat">
  <br><br><br><br><br><br>
<div class="frontview" >

	<form action="" method="post" class="form-group" >
		<p class="list-group-item">
			<label>Voter's ID</label>
			<input type="text" name="username" class="form-control">
		</p>
		<p class="list-group-item">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</p>
		<p class="list-group-item">
			<input type="submit" name="vote" value="Login to Vote" class="btn btn-success">
		</p>

	</form>
	<div class="notice_board">

		<?php
		if($sel_db){
			$notice = "SELECT * FROM post WHERE status = 'posted'";
			$show = mysqli_query($conn,$notice);
			$show_res = mysqli_fetch_array($show);
			$show_date = $show_res['date'];

			$date_month_now = date('m');
			//echo $date_month_now;
			$showed_date = date('m',strtotime($show_date));
			//echo $showed_date;
			if($date_month_now == $showed_date){
			if(mysqli_num_rows($show) > 0){
			$can_view = "SELECT * FROM candidates";
			$res = mysqli_query($conn,$can_view);
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
			echo "<hr/>";
			echo "<h3 align='center'>Notice Board</h3>";
			echo "<div id='div_print'>";
			echo "<h3 align='center'>Voting Results Posted on ".date('D M Y',strtotime($show_date))."</h3>";
			echo "<table class='table table-info'>";
			echo "<th>S/N</th>";
			echo "<th>Name of Candidate</th>";
			echo "<th>Position</th>";
			echo "<th>Party</th>";
					echo "<th>image</th>";
			echo "<th>Vote Count</th>";
			echo "<th>% percentage Vote</th>";
			$i = 1;
			while ($resultcan = mysqli_fetch_array($res)) {
				$id = $resultcan['id'];
				$votes_c = $resultcan['votes_count'];
				$bpercent = $votes_c/$total_votes;
				$percentage = $bpercent*100;

				echo "<tr><td>".$i."</td><td>".$resultcan['name_of_candidate']."</td><td>".$resultcan['position']."</td><td>".$resultcan['party']."</td><td><img src='commissioner/images/".$resultcan['image']."'width ='50'height = '50'/></td><td>"."</td><td>".$resultcan['votes_count']."</td><td> ~ ".floor($percentage)." %</td></tr>";
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
		<input type="button" name="b_print" class="btn btn-success" onclick="printdiv('div_print');" value="Print Results">
		<?php
		}
		}
		}
		?>
	</div>

</div>


</div>
<?php
include("footer.php");
?>
