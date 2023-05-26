<?php
session_start();


if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../../');
	exit;
}

include('./../../database/database.php');

$currentuser = $_SESSION['userid'];


$select_old_dp = "SELECT * FROM user WHERE id = '$currentuser'";
$select_old_dp_result = mysqli_query($connect, $select_old_dp);

$select_old_dp_rows = mysqli_fetch_assoc($select_old_dp_result);

$oldimage = $select_old_dp_rows['profile_photo'];


if (isset($_POST['update_profile_pic'])) {
	
	$old_image_path = $oldimage;
    $rentid = $rentalid;


  // Check if new image file is uploaded
      if ($_FILES['image']['error'] == 0) {

        // Upload new image file to server
          $new_image_path = $_FILES['image']['name'];
          $image_directory = $_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], $image_directory);

        // Delete old image file from server

          if ($oldimage != 'a.png') {
          	gc_collect_cycles();
            unlink($old_image_path);
          }

  $updatedetailsquery = "UPDATE user SET  profile_photo = '$new_image_path' WHERE id = '$currentuser'";
  $updatedetailsresult = mysqli_query($connect, $updatedetailsquery);

  if ($updatedetailsresult) {
    
    echo "<script>alert('Profile Updated Successfully!'); history.back(0);</script>";
  } else {

    echo "<script>alert('Something went wrong! try again later'); history.back(0);</script>";
  }

}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Chat Me - Update Profile</title>
</head>
<body>

	<form method="POST" action="" enctype="multipart/form-data" onsubmit="return updateRentalLogo()">
        <div class="card-body">
            <label for="image" id="imagemessage">Profile Photo</label>
            <br>
            <div class="btn btn-group">
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                <input type="submit" name="update_profile_pic" value="Update Profile" class="btn btn-primary">
            </div>
        </div>
    </form>

</body>
</html>