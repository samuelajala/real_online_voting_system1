<?php
session_start();
include('commissioner/functions/conc.php');
include("header.php");
?>

<!-- Begin Contents -->
<div class='contents'>
	<div class="content_para">
<?php
	include("voters_menu.php");
?>

<br/>
<div class="" align="center">
		<?php
		$session_id = 		$_SESSION['ID'];

		$image = "SELECT * FROM voters WHERE id='$session_id'";
		$run_image = mysqli_query($conn,$image);
		$vote_image=mysqli_fetch_array($run_image);


	 echo "<img src='commissioner/images/".$vote_image['image']."' id='img_upload'  alt='Max Image Size 1.5MB' height='300' weight='300'>";

	?>
	<form action="" method="post" enctype="multipart/form-data">
		<p class="list-group-item">
			<label>Update your Picture:</label>
			<input type="file" name="image"  required="required" />
		</p>
		<p class="list-group-item">
			<input type="submit" name="add_image" value="Update Image" class="btn btn-success">
		</p>
	</form>
</div>
</div>
</div>

<!-- End Contents -->
<?php
include("footer.php");


if($sel_db){

	if(isset($_REQUEST['add_image'])){
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file($image_tmp,"commissioner/images/$image");

			$update_image = "UPDATE voters SET image='$image' where id = $session_id";
			mysqli_query($conn,$update_image);
			echo"<script>window.open('dashboard.php','_self')</script>";

		}
	}
?>
