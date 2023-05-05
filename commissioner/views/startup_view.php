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
<?php
if(stripos($_SERVER['HTTP_USER_AGENT'], "Chrome") == true){
?>
<form action="" method="post" class="form-group">
	<p class="list-group-item">
		<label>Start Time:</label>
		<input type="date" name="starttime"  class="form-control">
	</p>
	<p class="list-group-item">
		<label>End Time:</label>
		<input type="date" name="endtime" class="form-control">
	</p>
	<p class="list-group-item">
		<input type="submit" name="start" value="Start Vote" class="btn btn-success">
	</p>
</form>
<?php
}elseif(stripos($_SERVER['HTTP_USER_AGENT'], "Safari") == true){
?>
<form action="" method="post" class="form-group">
	<p class="list-group-item">
		<label>Start Time:</label>
		<input type="date" name="starttime"  class="form-control">
	</p>
	<p class="list-group-item">
		<label>End Time:</label>
		<input type="date" name="endtime" class="form-control">
	</p>
	<p class="list-group-item">
		<input type="submit" name="start" value="Start Vote" class="btn btn-success">
	</p>
</form>
<?php
}else{
?>
<form action="" method="post" class="form-group">
	<p class="list-group-item">
		<label>Start Time:</label>
		<input type="date" name="starttime" value="<?php echo date('Y-m-d'); ?>" class="form-control">
	</p>
	<p class="list-group-item">
		<label>End Time:</label>
		<input type="date" name="endtime" value="<?php echo date('Y-m-d'); ?>" class="form-control">
	</p>
	<p class="list-group-item">
		<input type="submit" name="start" value="Start Vote" class="btn btn-success">
	</p>
</form>
<?php	
}
?>
<script type="text/javascript">
	function confirm(){
		alert("Are you sure, you want to stop voting!");
	}
	
</script>
</body>
</html>