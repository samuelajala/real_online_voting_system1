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
		<label>Name of Party:</label>
		<input type="text" name="party" class="form-control">
	</p>
	<p class="list-group-item">
		<input type="submit" name="add_party" value="Add Party" class="btn btn-success">
	</p>
</form>
<script type="text/javascript">
	function confirm(){
		alert("Are you sure, you want to delete that entry!");
	}
	
</script>
</body>
</html>