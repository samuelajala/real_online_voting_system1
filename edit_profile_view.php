<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System - Voter</title>
</head>
<body>
	<?php
	if(isset($status)){
		echo $status;
	}
	?>
<form action="" method="post" class="form-group">
	<p class="list-group-item">
		<label>Fullname:</label>
		<input type="text" name="fullname" value="<?php echo $result['fullname'];?>" class="form-control">
	</p>
	
	<p class="list-group-item">
		<label>Gender:</label>
		<select name="gender" class="form-control">
			<option><?php echo $result['gender'];?></option>
			<option>Male</option>
			<option>Female</option>
		</select>
	</p>
	<p class="list-group-item">
		<label>Location of Voter:</label>
		<input type="text" name="location" value="<?php echo $result['location'];?>" class="form-control">
	</p>
	
	<p class="list-group-item">
		<input type="submit" name="edit" value="Update" class="btn btn-success">
	</p>
</form>

</body>
</html>