<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System - Add Admin</title>
</head>
<body>
	<?php
	if(isset($status)){
		echo $status;
	}
	?>
<form action="" method="post" class="form-group" enctype="multipart/form-data">
	<p class="list-group-item">
		<label>Name of Candidate:</label>
		<input type="text" name="name" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Position:</label>
		<select name="position" class="form-control">
			<option>Select a position</option>
			<?php
			while($result2 = mysqli_fetch_array($res2)){
			echo "<option>".$result2['position']."</option>";
			}
			?>
		</select>
	</p>
	<p class="list-group-item">
		<label>Candidate's Party:</label>
		<select name="party" class="form-control">
			<option>Select a party</option>
			<?php
			while($result = mysqli_fetch_array($res)){
			echo "<option>".$result['party']."</option>";
			}
			?>
		</select>
	</p>
	<p class="list-group-item">
		<label>Upload your Picture:</label>
		<input type="file" name="image"  required="required" />
	</p>
	<p class="list-group-item">
		<input type="submit" name="add_candidate" value="Add Candidate" class="btn btn-success">
	</p>
</form>
<script type="text/javascript">
	function confirm(){
		alert("Are you sure, you want to delete that entry!");
	}

</script>
</body>
</html>
