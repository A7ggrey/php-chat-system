<?php

session_start();

if (!isset($_SESSION['login_user'])) {
  
  header('location: ./../');
  exit;
}

include('./../database/database.php');

$user = $_GET['user'];
$sender = $_SESSION['userid'];

$select_user_details = "SELECT * FROM user WHERE id = '$user'";
$select_user_result = mysqli_query($connect, $select_user_details);

$select_user_rows = mysqli_fetch_assoc($select_user_result);

$reciever_name = $select_user_rows['full_name'];
$reciever_profile = $select_user_rows['profile_photo'];


$select_messages_to_read = "SELECT * FROM readmessages WHERE sender_id = '$user' AND reciever_id = '$sender'";
$select_messages_to_read_result = mysqli_query($connect, $select_messages_to_read);

if (mysqli_num_rows($select_messages_to_read_result) > 0) {
    
    $selected_messages_to_read_rows = mysqli_fetch_assoc($select_messages_to_read_result);

    $sender_one = $selected_messages_to_read_rows['sender_id'];
    $reciever_one = $selected_messages_to_read_rows['reciever_id'];

    date_default_timezone_set("Africa/Nairobi");
    $date = date('d/m/Y');
    $time = date('h:i:sa');


if ($sender != $sender_one) {

    $updates_status = 1;

    $update_messages_to_read = "UPDATE readmessages SET status = '$updates_status', read_date = '$date', read_time = '$time' WHERE reciever_id = '$sender'";
    $update_messages_to_read_result = mysqli_query($connect, $update_messages_to_read);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat Me | <?php echo $reciever_name;?></title>

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
                <h3 class="card-title">Chat Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <?php

                    $select_message_query = "SELECT * FROM messages WHERE readerid = '$user' AND senderid = '$sender' OR readerid = '$sender' AND senderid = '$user'";
                    $select_message_result = mysqli_query($connect, $select_message_query);

                    //$rows_selected_display = mysqli_fetch_assoc($select_message_result);


                    if (mysqli_num_rows($select_message_result) > 0) {
                      while ($rows_selected = mysqli_fetch_assoc($select_message_result)) {

                        $reciever_id = $rows_selected['readerid'];
                        $sender_id = $rows_selected['senderid'];
                  ?>

        <div>
          <p>
                  <?php

                    if ($sender == $rows_selected['senderid']) {

                      $select_dp_sender = "SELECT * FROM user WHERE id = '$sender_id'";
                      $select_dp_sender_result = mysqli_query($connect, $select_dp_sender);

                      $select_dp_sender_rows = mysqli_fetch_assoc($select_dp_sender_result);

                      $sender_dp = $select_dp_sender_rows['profile_photo'];
                      $sender_full_name = $select_dp_sender_rows['full_name'];
                  
                      //echo '<div class="input-group mb-3 sender-div"><span class="sender-span-1"> <img src="./profile/' .$sender_dp. ' " class="dp_display_sender"><br><br> ' .$rows_selected['message']. ' <br><br><span class="sender-span-2">' .$rows_selected['time']. ' - ' .$rows_selected['date']. ' <span class="sender-span-3">send</span> </span> </span></div>';
                      ?>

                         <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?php echo $sender_full_name;?></span>
                      <span class="direct-chat-timestamp float-left"><?php echo $rows_selected['date']. " " .$rows_selected['time'];?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="./profile/<?php echo $sender_dp;?>" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $rows_selected['message'];?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->                  

                      <?php
                    
                    } else {

                      $select_dp_receiver = "SELECT * FROM user WHERE id = '$sender_id'";
                      $select_dp_receiver_result = mysqli_query($connect, $select_dp_receiver);

                      $select_dp_receiver_rows = mysqli_fetch_assoc($select_dp_receiver_result);

                      $receiver_dp = $select_dp_receiver_rows['profile_photo'];
                      $reciever_full_name = $select_dp_receiver_rows['full_name'];

                      //echo '<div class="input-group mb-3 bg-success receiver-div"><span class="receiver-span-1"><img src="./profile/' .$receiver_dp. ' " class="dp_display_receiver"> <br><br>' .$rows_selected['message']. ' <br><br><span class="receiver-span-2">' .$rows_selected['time']. ' - ' .$rows_selected['date']. ' <span class="receiver-span-3"> recieved</span></span></span></div>';
                      ?>

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?php echo $reciever_full_name;?></span>
                      <span class="direct-chat-timestamp float-right"><?php echo $rows_selected['date']. " " .$rows_selected['time'];?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="./profile/<?php echo $receiver_dp;?>" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $rows_selected['message'];?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                      <?php
                    }
                  ?>
          </p>
        </div>

                  <?php
                  
                    }
                  
                  } else {

      echo '<div style="background-color: black; color: white; text-align: center; margin-top: 17px;">
                  <span>Start a New Chat</span>
            </div>';
                  }

                  ?>

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user1-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user7-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user3-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user5-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user6-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="./../dist/img/user8-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="send-message.php" method="POST">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
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
