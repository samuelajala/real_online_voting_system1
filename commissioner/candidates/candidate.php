<?php
if($sel_db){
  $sql = "SELECT * FROM party";
  $res = mysqli_query($conn,$sql);

  $sql2 = "SELECT * FROM positions";
  $res2 = mysqli_query($conn,$sql2);

  if(isset($_REQUEST['add_candidate'])){
    $name = addslashes($_POST['name']);
    $position = addslashes($_POST['position']);
    $party = addslashes($_POST['party']);

    //image
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp,"images/$image");

    if($name == ""){
      echo "<div class='alert alert-danger'>Candidate's Name is required</div>";
      $add = 0;
    }

    if($position == ""){
      echo "<div class='alert alert-danger'>Position is required</div>";
      $add = 0;
    }

    if($position == "Select a position"){
      echo "<div class='alert alert-danger'>Please select a position</div>";
      $add = 0;
    }

    if($party == ""){
      echo "<div class='alert alert-danger'>Party Name is required</div>";
      $add = 0;
    }

    if($party == "Select a party"){
      echo "<div class='alert alert-danger'>Please select a party</div>";
      $add = 0;
    }

    if(isset($add)){
      echo "<div class='alert alert-danger'>Sorry we couldn't add a candidate at the moment, try again later</div>";

    }else{
      $sql_can = "INSERT INTO candidates(name_of_candidate,position,party,image) VALUES('$name','$position','$party','$image')";
      mysqli_query($conn,$sql_can);
      $status = "<div class='alert alert-success'>Candidate Added Successfully</div>";
    }

  }

include("views/add_candidates_view.php");

}
?>
