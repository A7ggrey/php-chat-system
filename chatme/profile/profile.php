<?php

session_start();

if (!isset($_SESSION['login_user'])) {
  
  header("location: ./../../");
  exit;
}

include('./../../database/database.php');

if (isset($_GET['opid'])) {
  
  $follow_me = $_GET['opid'];
} else {

  $follow_me = $_SESSION['userid'];
}
    
   $current_user = $_SESSION['userid'];

if (!isset($_GET['opid'])) {
  
  

    $select_profile = "SELECT * FROM user WHERE id = '$current_user'";
    $select_profile_result_current = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result_current) > 0) {
  
      $select_profile_rows = mysqli_fetch_assoc($select_profile_result_current);

      $current_user_name = $select_profile_rows['full_name'];
      $current_user_username = $select_profile_rows['username'];
      $current_user_user_name = $select_profile_rows['othername'];
      $current_user_profile = $select_profile_rows['profile_photo'];
      $current_user_verify = $select_profile_rows['verified'];
} else {

  //echo "<script>history.back(-1);</script>";
}

} else {

  $opid = $_GET['opid'];

  $select_profile = "SELECT * FROM user WHERE id = '$opid'";
    $select_profile_result_other = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result_other) > 0) {
  
      $select_profile_rows = mysqli_fetch_assoc($select_profile_result_other);

      $current_user_name = $select_profile_rows['full_name'];
      $current_user_username = $select_profile_rows['username'];
      $current_user_user_name = $select_profile_rows['othername'];
      $current_user_profile = $select_profile_rows['profile_photo'];
      $current_user_verify = $select_profile_rows['verified'];
} else {

  //echo "<script>history.back(-1);</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat Me | <?php echo $current_user_name;?> - Profile</title>

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
  <div class="content">

    <!-- Main content -->
    <section class="content" id="content_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="./<?php echo $current_user_profile;?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $current_user_name;?></h3>

                <p class="text-muted text-center"><b>@</b><?php echo $current_user_user_name;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <?php

                      $select_followers = "SELECT * FROM followers WHERE my_id = '$follow_me'";
                      $select_followers_result = mysqli_query($connect, $select_followers);

                      $count_followers = mysqli_num_rows($select_followers_result);

                      //echo "Followed By <span style='color: blue;'>" .$count_followers. "</span> User";

                  ?>
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right"><?php echo $count_followers;?></a>
                  </li>
                  <?php

                      $select_following = "SELECT * FROM followers WHERE follower_id = '$follow_me'";
                      $select_following_result = mysqli_query($connect, $select_following);

                      $count_following = mysqli_num_rows($select_following_result);

                      //echo "Followed By <span style='color: blue;'>" .$count_following. "</span> User";

                  ?>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right"><?php echo $count_following;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right"><?php echo $count_followers;?></a>
                  </li>
                

                <?php

          $select_unfollow = "SELECT * FROM followers WHERE my_id = '$follow_me' AND follower_id = '$current_user'";
          $select_unfollow_result = mysqli_query($connect, $select_unfollow);
          $count_unfollow = mysqli_num_rows($select_unfollow_result);


          if ($count_unfollow > 0) {
            
            ?>

                  <li class="list-group-item">
                    <b>You are following this account.</b>
                  </li>

            <p>
              <form method="POST" action="follower.php">
                <input type="hidden" name="unfollow_id" value="<?php echo $follow_me;?>">
                <input type="submit" name="unfollower_btn" class="btn btn-warning btn-block" value="Unfollow">
              </form>
            </p>

          <?php

          } else {
            ?>

                  <li class="list-group-item">
                    <b>You don't follow this account.</b>
                  </li>

              <p>
                <form method="POST" action="follower.php">
                  <input type="hidden" name="follow_id" value="<?php echo $follow_me;?>">
                  <input type="submit" name="follower_btn" class="btn btn-success btn-block" value="Follow">
                </form>
              </p>

              <?php
          }

      ?>

      <?php

          if (isset($select_profile_result_current)) {
            
            if (mysqli_num_rows($select_profile_result_current) > 0) {

            echo '<p><a href="./update_profile.php" class="btn btn-default btn-block"><b>Update Profile</b></a></p>';

          }
          }
      ?>
            </ul>    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->

              <?php

                  $select_about = "SELECT * FROM about_user WHERE user_id = '$current_user'";
                  $select_about_result = mysqli_query($connect, $select_about);

                  if (mysqli_num_rows($select_about_result) > 0) {
                    
                    $select_about_rows = mysqli_fetch_assoc($select_about_result);

                    $education = $select_about_rows['latest_education'];
                    $my_location = $select_about_rows['location'];
                    $skills = $select_about_rows['skills'];
                    $job_description = $select_about_rows['job_description'];
                    $user_bios = $select_about_rows['bios'];
                  } else {
                    
                    $education = ""; 
                    $my_location = ""; 
                    $skills = ""; 
                    $job_description = ""; 
                    $user_bios = "";
                  }

              ?>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Work</strong>

                <p class="text-muted">
                  <?php echo $job_description?>
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php echo $education?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?php echo $my_location;?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <?php echo $skills;?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Bios</strong>

                <p class="text-muted"><?php echo $user_bios;?></p>
              </div>
              <!-- /.card-body -->
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
