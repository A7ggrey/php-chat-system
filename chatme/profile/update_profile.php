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
$full = $select_old_dp_rows['full_name'];
$email_add = $select_old_dp_rows['username'];
$othername_add = $select_old_dp_rows['othername'];
//$full = $select_old_dp_rows


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
    
    echo "<script>alert('Profile Photo Updated Successfully!'); history.back(0);</script>";
  } else {

    echo "<script>alert('Something went wrong! try again later'); history.back(0);</script>";
  }

}
}

if (isset($_POST['update_profile'])) {
  
      $full_name = mysqli_real_escape_string($connect, $_POST['full_name']);
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $othername = mysqli_real_escape_string($connect, $_POST['othername']);
      //$private = mysqli_real_escape_string($connect, $private);

      if (isset($_POST['private'])) {
        
        $private = 1;
      } else {

        $private = 0;
      }

      $update_user_profile = "UPDATE user SET full_name = '$full_name', username = '$email', private_account = '$private', othername = '$othername' WHERE id = '$currentuser'";
      $update_user_profile_result = mysqli_query($connect, $update_user_profile);

      if ($update_user_profile_result) {
            
          echo "<script>alert('Profile Updated Successfully!'); history.back(0);</script>";
      } else {

          echo "<script>alert('Something went wrong! try again later'); history.back(0);</script>";
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
    <br>
    <br>

    <form method="POST" action="">
      <div class="card-body">
            <label for="full" id="full">Full Name</label>
            <br>
            <div class="">
                <input type="text" class="form-control" name="full_name" value="<?php echo $full;?>" id="full">
            </div>

            <label for="user" id="user">User Name</label>
            <br>
            <div class="">
                <input type="text" class="form-control" name="othername" value="<?php echo $othername_add;?>" id="user">
            </div>

            <label for="email" id="email">Email</label>
            <br>
            <div class="">
                <input type="text" class="form-control" name="email" value="<?php echo $email_add;?>" id="email">
            </div>

            <br>
            <div class="">
                <input type="checkbox" class="form-check-input" name="private" id="private">
                <label for="private">Make account <a href="#">private</a></label>
            </div>
        </div>

            <br>
            <div class="">
              <input type="submit" name="update_profile" value="Update Profile">
            </div>
    </form>

</body>
</html>