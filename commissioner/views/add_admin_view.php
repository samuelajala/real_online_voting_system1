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
<form action="" method="post" class="form-group">
	<p class="list-group-item">
		<label>Username:</label>
		<input type="text" name="username" class="form-control" >
	</p>
	<p class="list-group-item">
		<label>Password:</label>
		<input type="password" name="password" class="form-control" >
	</p>
	<p class="list-group-item">
		<label>Role:</label>
		<select name="role" class="form-control">
			<option>Select a Role</option>
			<option>Admin</option>
			<option>Moderator</option>
		</select>
	</p>
	<p class="list-group-item">
		<input type="submit" name="create" value="Create" class="btn btn-success">
	</p>
</form>
<script type="text/javascript">
	function confirm(){
		alert("Are you sure, you want to delete that entry!");
	}
	
</script>
</body>
</html>