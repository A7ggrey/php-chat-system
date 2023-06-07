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
$privacy = $select_old_dp_rows['private_account'];


if (isset($_POST['update_profile_pic'])) {
  
    $old_image_path = $oldimage;


  // Check if new image file is uploaded
      if ($_FILES['image']['error'] == 0) {

        // Upload new image file to server
          $new_image_path = $_FILES['image']['name'];
          $image_directory = $_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], $image_directory);

        // Delete old image file from server

          if ($oldimage != 'a.png') {
            if ($oldimage != NULL || $oldimage != "") {
              
              gc_collect_cycles();
              unlink($old_image_path);
            }
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

      if (isset($_POST['update_about'])) {
  
      $education_level = mysqli_real_escape_string($connect, $_POST['education_level']);
      $current_location = mysqli_real_escape_string($connect, $_POST['current_location']);
      $accured_skills = mysqli_real_escape_string($connect, $_POST['accured_skills']);
      $about_self = mysqli_real_escape_string($connect, $_POST['about_self']);
      $work_experience = mysqli_real_escape_string($connect, $_POST['work_experience']);

      $select_about = "SELECT * FROM about_user WHERE user_id = '$currentuser'";
      $select_about_result = mysqli_query($connect, $select_about);

      $select_about_rows = mysqli_fetch_assoc($select_about_result);

      $education = $select_about_rows['latest_education'];

      if (mysqli_num_rows($select_about_result) > 0) {
        
        $update_about = "UPDATE about_user SET user_id = '$currentuser', latest_education = '$education_level', location = '$current_location', skills = '$accured_skills', job_description = '$work_experience', bios = '$about_self' WHERE user_id = '$currentuser'";
        $update_about_result = mysqli_query($connect, $update_about);

      if ($update_about_result) {
            
          echo "<script>alert('About Updated Successfully!'); history.back(0);</script>";
      } else {

          echo "<script>alert('Something went wrong! try again later'); history.back(0);</script>";
      }

      } else {

        $insert_about = "INSERT INTO about_user(user_id, latest_education, location, skills, job_description, bios) VALUES('$currentuser', '$education_level', '$current_location', '$accured_skills', '$work_experience', '$about_self')";
        $insert_about_result = mysqli_query($connect, $insert_about);

        if ($insert_about_result) {
            
          echo "<script>alert('About Updated Successfully!'); history.back(0);</script>";
      } else {

          echo "<script>alert('Something went wrong! try again later'); history.back(0);</script>";
      }

      }
}


         $select_about_display = "SELECT * FROM about_user WHERE user_id = '$currentuser'";
         $select_about_display_result = mysqli_query($connect, $select_about_display);

         $select_about_display_rows = mysqli_fetch_assoc($select_about_display_result);

         $education = $select_about_display_rows['latest_education'];
         $my_location = $select_about_display_rows['location'];
         $skills = $select_about_display_rows['skills'];
         $job_description = $select_about_display_rows['job_description'];
         $user_bios = $select_about_display_rows['bios'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">
    #content_section {
      margin-top: 110px;
    }
    .main_div {
      margin: 0 auto;
      width: 60%;
    }

    @media (max-width: 480px) {

      #content_section {
        margin-top: 100px;
      }
      .main_div {
      margin: 0 auto;
      width: 95%;
    }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="main_div">
  <!-- Content Wrapper. Contains page content -->
  <div class="content" id="content_section">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><b>Personal Details</b></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="">
                  <!-- /.tab-pane -->
                  <div class="" id="">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Profile Photo</label>
                        <div class="col-sm-10">
                          <div class="btn btn-group">
                            <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                            <input type="submit" name="update_profile_pic" value="Update Profile" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>


                    <form class="form-horizontal" method="POST" action="" onsubmit="return updateProfile()">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="full_name" id="inputName" value="<?php echo $full;?>" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $email_add;?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputUserName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="othername" id="inputUserName" value="<?php echo $othername_add;?>" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <?php

                                  if ($privacy == 0) {
                                    
                                    ?>
                                    <input type="checkbox" name="private"> Make account <a href="#">Private</a>

                                    <?php
                                  } else {

                                    ?>
                                    <input type="checkbox" name="private" checked> Make account <a href="#">Private</a>

                                    <?php
                                  }

                              ?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update_profile" class="btn btn-info">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><b>About Me</b></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="">
                  <!-- /.tab-pane -->
                  <div class="" id="">
                    <form class="form-horizontal" method="POST" action="">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <input type="text" name="education_level" class="form-control" value="<?php echo $education;?>" id="inputName" placeholder="Latest Education Level">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <input type="text" name="current_location" class="form-control" value="<?php echo $my_location;?>" id="inputEmail" placeholder="Current Location">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" name="accured_skills" class="form-control" value="<?php echo $skills;?>" id="inputName2" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Bios</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="about_self" id="inputExperience" value="<?php echo $user_bios;?>" placeholder="Write something about yourself..."></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Work</label>
                        <div class="col-sm-10">
                          <input type="text" name="work_experience" class="form-control" value="<?php echo $job_description;?>" id="inputSkills" placeholder="Work Place">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update_about" class="btn btn-primary">Update About</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
