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
                <h3 class="card-title">Chats - <a href="./chats.php">New Chat</a> - <a href="./profile/profile.php">My Profile</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  
                <!-- Contacts are loaded here -->
                <div class="">
                  
                  <ul class="contacts-list">
                    <?php

                      $currentuser = $_SESSION['userid'];

                      //include('./message-select.php');

                      //$query = "SELECT messages.*, user.* FROM messages INNER JOIN user ON messages.readerid = user.id WHERE messages.senderid = '$currentuser' OR messages.readerid = '$currentuser' GROUP BY user.id";

                      $query_chats = "SELECT chats.*, user.* FROM user INNER JOIN chats ON user.id = chats.user_id WHERE chats.current_user_id = '$currentuser' OR chats.user_id = '$currentuser' ORDER BY chats.chat_date DESC, chats.chat_time DESC";
                      $result_chats = mysqli_query($connect, $query_chats);

                      //$rows_before = mysqli_fetch_assoc($result_chats);

                      if (mysqli_num_rows($result_chats) > 0) {

                        while($rows_chats = mysqli_fetch_assoc($result_chats)) {

                          $my_id = $rows_chats['current_user_id'];
                          $your_id = $rows_chats['user_id'];
                          //$user_id_two = $rows_chats['']

                          if ($my_id == $currentuser) {
        
                            $id_to_display = $your_id;
                          } else {

                            $id_to_display = $my_id;
                          }

                    ?>
                    <li>
                      <a href="read.php?user=<?php echo $id_to_display;?>">
                        <?php 
                              //if ($id_to_display == $your_id) {
                  
                              $select_your_id = "SELECT * FROM user WHERE id = '$id_to_display'";
                              $select_your_id_result = mysqli_query($connect, $select_your_id);

                              if (mysqli_num_rows($select_your_id_result) > 0) {
                    
                                $select_your_id_rows = mysqli_fetch_assoc($select_your_id_result);

                                $verify_tick = $select_your_id_rows['verified'];
                                $profile_photo = $select_your_id_rows['profile_photo'];
                                $user_full_name = $select_your_id_rows['full_name'];
                            
                            ?>

                      <!--<img src="./profile/<?php //echo $profile_photo;?>" class="profile_user">&nbsp;<?php //echo $select_your_id_rows['full_name'];?>&nbsp; <?php //if($verify_tick == 1) {?><img src="./photos/verify.jpg" class="verified"></span><br>-->

                      <img class="contacts-list-img" src="./profile/<?php echo $profile_photo;?>" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">

                            <!-- Name not displaying -->                          
                            <?php echo $user_full_name;?>

                            <?php

                            //php code to display the last message send by either user

                              $select_message_display = "SELECT messages.*, readmessages.* FROM readmessages INNER JOIN messages ON readmessages.messageid = messages.id WHERE readmessages.sender_id = '$currentuser' AND readmessages.reciever_id = '$id_to_display' OR readmessages.sender_id = '$id_to_display' AND readmessages.reciever_id = '$currentuser' ORDER BY readmessages.messageid DESC LIMIT 1";
                              $select_message_display_result = mysqli_query($connect, $select_message_display);

                              if (mysqli_num_rows($select_message_display_result) > 0) {

                                //$count_unread = mysqli_num_rows($select_message_display_result);
                  
                                while ($rows_messages_read = mysqli_fetch_assoc($select_message_display_result)) {

                                  $select_time_to_display = $rows_messages_read['time'];
                                  $select_date_to_display = $rows_messages_read['date'];
                                  $select_user_to_display = $rows_messages_read['senderid'];
                    
                            ?>
                            <small class="contacts-list-date float-right"><!--2/23/2015--><?php echo $select_time_to_display. " - " .$select_date_to_display;?>
                            </small>
                          </span>
                          
                          <span class="contacts-list-msg">


                            <?php
                              //if sender is me, then display this, else don't display to reciever (changes to make)
                              //count the number of unread messages and display how they are
                              //capitalize first letters for each sentense when writing a message
                              //don't display badge and single and double ticks to the sender
                                

                                if ($id_to_display == $select_user_to_display) {
  
                                  if ($rows_messages_read['status'] == 0) {

                                  $zero = 0;

                                  $select_message_display_count = "SELECT * FROM readmessages WHERE sender_id = '$currentuser' AND reciever_id = '$id_to_display' AND status = '$zero' OR sender_id = '$id_to_display' AND reciever_id = '$currentuser' AND status = '$zero'";
                                  $select_message_display_result_count = mysqli_query($connect, $select_message_display_count);

                                  $count_unread = mysqli_num_rows($select_message_display_result_count);
                          
                                  echo "&nbsp;&nbsp; <span style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 90px;' id='message'>" .$rows_messages_read['message']. "</span> <span class='badge badge-info right' style='float: right;'>" .$count_unread. "</span>";
                                } elseif ($rows_messages_read['status'] == 1) {
                          
                                  echo "&nbsp;&nbsp; <span style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 90px;' id='message'>" .$rows_messages_read['message']. "</span>" ;
                                }

                                } else {

                                  if ($rows_messages_read['status'] == 0) {

                                  $zero = 0;

                                  $select_message_display_count = "SELECT * FROM readmessages WHERE sender_id = '$currentuser' AND reciever_id = '$id_to_display' AND status = '$zero' OR sender_id = '$id_to_display' AND reciever_id = '$currentuser' AND status = '$zero'";
                                  $select_message_display_result_count = mysqli_query($connect, $select_message_display_count);

                                  $count_unread = mysqli_num_rows($select_message_display_result_count);
                          
                                  echo "&nbsp;&nbsp;&#x2713; <span style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 90px;' id='message'>" .$rows_messages_read['message']. "</span>";
                                } elseif ($rows_messages_read['status'] == 1) {
                          
                                  echo "&nbsp;&nbsp; <span style='color: blue;'>&#x2713;&#x2713;<?span> <span style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 90px;' id='message'>" .$rows_messages_read['message']. "</span>" ;
                                }
                                }
                            ?>
                            
                            <?php
                                  }
                                }
                            ?>

                      <?php
                    }
                  }
                 //}
                 ?>
                        
                            

                          </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                            <?php
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
  var truncated = mes.substring(0, 50) + ' ...';
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
