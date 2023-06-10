<?php

session_start();

if (!isset($_SESSION['login_user'])) {
  
  header('location: ./../');
  exit;
}

include('./../database/database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat Me | Chats</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./../plugins/summernote/summernote-bs4.min.css">
  <style type="text/css">
    #content_section {
      margin-top: 110px;
    }
    .main_div {
      margin: 0 auto;
      width: 60%;
    }

    .new_serch_form {
      float: right; 
      margin-left: 100px;
    }

    @media (max-width: 480px) {

      #content_section {
        margin-top: 100px;
      }
      .main_div {
      margin: 0 auto;
      width: 95%;
    }
    .new_serch_form {
      /*float: right; 
      margin-right: 100px;
      position: absolute;
      margin-top: 5px;*/
    }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="main_div">


  <!-- Main content -->
    <section class="content" id="content_section">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Followers - 
                  <a href="./chats.php">Chats</a> - 
                  <a href="./profile/profile.php">My Profile</a> - 
                  <a href="logout.php">Logout</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  
                <!-- Contacts are loaded here -->
                <div class="">
                  
                  <ul class="contacts-list">
                    <?php

                      $currentuser_id = $_SESSION['userid'];

                      if (isset($_GET['followers'])) {
                        $friends_id = $_GET['followers'];

                        $select_friends_followers = "SELECT user.*, followers.* FROM user INNER JOIN followers ON user.id = followers.follower_id WHERE followers.my_id = '$friends_id'";
                        $select_friends_followers_result = mysqli_query($connect, $select_friends_followers);

                        if (mysqli_num_rows($select_friends_followers_result) > 0) {
    
                          while ($select_friends_followers_rows = mysqli_fetch_assoc($select_friends_followers_result)) {
                            ?>

                    <li>
                      <img class="contacts-list-img" src="./profile/<?php echo $select_friends_followers_rows['profile_photo'];?>" alt="User Avatar">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            <small class="contacts-list-date float-right">
                              <!--<a href="./friends.php?followers=<?php echo $user_id_for_followers;?>"><?php //echo $count_followers;?> Followers</a> - 
                                <a href="./profile/profile.php?opid=<?php echo $user_id_for_followers;?>">Visit Profile</a>-->
                            </small>
                          </span>
                          &nbsp;
                          <spnan class="contacts-list-msg">
                            <a href="./profile/profile.php?opid=<?php echo $select_friends_followers_rows['id'];?>">
                              <?php echo $select_friends_followers_rows['full_name'];?>
                            </a>
                          </span>
                        </div>
                    </li>

      <?php
    }
  } else {
    ?>

                    <li>
                      <!--<img class="contacts-list-img" src="./profile/<?php echo $profile_photo;?>" alt="User Avatar">-->
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            <small class="contacts-list-date float-right">
                            </small>
                          </span>
                          &nbsp;
                          <span class="contacts-list-msg">
                            No one has followed this profile yet!
                          </span>
                        </div>
                    </li>

                    <?php
}
}
//}

?> 
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  var mes = document.getElementById('message').innerHTML;
  var truncated = mes.substring(0, 50) + ' ';
  document.getElementById('message').innerHTML = truncated;
</script>

<!-- jQuery -->
<script src="./../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./../plugins/moment/moment.min.js"></script>
<script src="./../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./../dist/js/adminlte.js"></script>
</body>
</html>
