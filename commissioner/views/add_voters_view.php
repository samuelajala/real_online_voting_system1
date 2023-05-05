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
		<label>Fullname:</label>
		<input type="text" name="fullname" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Email Address:</label>
		<input type="text" name="email" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Username:</label>
		<input type="text" name="username" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Password:</label>
		<input type="password" name="password" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Confirm Password:</label>
		<input type="password" name="conf_password" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Gender:</label>
		<select name="gender" class="form-control">
			<option>Select a gender</option>
			<option>Male</option>
			<option>Female</option>
		</select>
	</p>
	<p class="list-group-item">
		<label>Location of Voter:</label>
		<input type="text" name="location" class="form-control">
	</p>
	<p class="list-group-item">
		<label>Status:</label>
		<select name="status" class="form-control">
			<option>Select a status</option>
			<option>Accredited</option>
			<option>UnAccredited</option>
		</select>
	</p>
	<p class="list-group-item">
		<label>Upload your Picture:</label>
		<input type="file" name="image"  required="required" />
	</p>
	<p class="list-group-item">
		<input type="submit" name="add_voters" value="Add Voters" class="btn btn-success">
	</p>
</form>
<script type="text/javascript">
	function confirm(){
		alert("Are you sure, you want to delete that entry!");
	}

</script>
</body>
</html>
