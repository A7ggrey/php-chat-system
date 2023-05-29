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


$select_messages_to_read = "SELECT * FROM readmessages WHERE"

if ($sender != $sender) {
    # code...
}
$update_messages_to_read = "INSERT "


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Chat Me - <?php echo $reciever_name;?></title>
<style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    .fixed-header, .fixed-footer{
        z-index: 1000;
        width: 100%;
        position: fixed;        
        background: brown;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
    }    
    /* Some more styles to beutify this example */
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }

    .sender-div {
        position: relative;
    	width: 80%;
    	background-color: lightblue;
    	margin: 0 auto;
        margin-top: 5px;
        margin-bottom: 5px;
        min-height: 60px;
        border-style: dotted;
        border-color: blue;
        border-radius: 20px;
    }

    .sender-span-1 {
    	margin-left: 7px;
        width: 60%;
    }

    .sender-span-2 {
        position: absolute;
    	 color: black;
    	 font-size: 9px;
    	 bottom: 8px;
         right: 10px;
    }

    .sender-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    }

    .receiver-div {
        position: relative;
    	width: 80%;
    	background-color: lightgreen;
    	margin: 0 auto;
        margin-top: 5px;
        margin-bottom: 5px;
        min-height: 60px;
        border-style: dotted;
        border-color: green;
        border-radius: 20px;
    }

    .receiver-span-1 {
    	margin-left: 17px;
        width: 60%;
    }

    .receiver-span-2 {
        position: absolute;
    	 color: black;
    	 font-size: 9px;
         left: 10px;
         bottom: 8px;
         bottom: 0;
    }

    .receiver-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    }

    .dp_display_sender {
    	width: 30px;
    	height: 30px;
    	float: right;
        margin-right: 7px;
        margin-top: 3px;
        border-radius: 100%;
    }

    .dp_display_receiver {
    	width: 30px;
    	height: 30px;
    	float: left;
        margin-left: 7px;
        margin-top: 3px;
        border-radius: 100%;
    }

    .receiver-profile {
        width: 20px;
        height: 20px;
        border-radius: 100%;
        margin-top: 4px;
    }

    .name-display {
        font-size: 20px;
        margin-top: 2px;
    }

    @media only screen and (max-device-width: 480px) {
    	/* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;
        z-index: 1000;       
        background: brown;
        padding: 10px 0;
        color: #fff;
        height: 100px;
        font-size: 35px;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
        padding-left: 25px;
        padding-top: 25px;
        margin-top: 10px;
    }    
    /* Some more styles to beutify this example */
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }

    .messages {
    	margin-top: 90px;
    }
    .form-control {
    	font-size: 40px;
    	border-radius: 10px;
    }
    #btn {
    	font-size: 40px;
    	background-color: blue;
    	color: white;
    	border-radius: 12px;
    }
    .sender-div {
    	width: 100%;
        position: relative;
    	background-color: lightblue;
    	padding-top: 10px;
    	padding-left: 4px;
    	margin: 0 auto;
    	margin-bottom: 100px;
        min-height: 160px;
    }

    .sender-span-1 {
    	margin-left: 7px;
    	font-size: 30px;
    }

    .sender-span-2 {
    	 position: absolute;
         color: black;
         bottom: 8px;
         right: 2px;
         font-size: 18px;
    }

    .sender-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 font-size: 18px;
    }

    .receiver-div {
        position: relative;
    	width: 100%;
    	background-color: lightgreen;
    	padding-top: 10px;
    	padding-left: 4px;
    	margin: 0 auto;
    	margin-bottom: 100px;
        min-height: 200px;
    }

    .receiver-span-1 {
    	margin-left: 7px;
    	font-size: 30px;
    }

    .receiver-span-2 {
         position: absolute;
    	 color: black;
         bottom: 8px;
         left: 2px;
         font-size: 18px;
    }

    .receiver-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 font-size: 18px;
    }

    .dp_display_sender {
        width: 70px;
        height: 70px;
        float: right;
        margin-right: 7px;
        margin-top: 3px;
        border-radius: 100%;
    }

    .dp_display_receiver {
        width: 70px;
        height: 70px;
        float: left;
        margin-left: 7px;
        margin-top: 3px;
        border-radius: 100%;
    }

    .receiver-profile {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        margin-top: 25px;
    }

    .name-display {
        font-size: 30px;
        margin-top: 2px;
    }

    }
</style>
</head>
<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                    <span>
                        <img src="./profile/<?php echo $reciever_profile;?>" class="receiver-profile">
                        &nbsp;
                        <span class="name-display"><?php echo $reciever_name;?></span>
                    </span>
            </nav>
        </div>
    </div>
    <div class="container messages">
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
						    	
						    	echo '<div class="input-group mb-3 sender-div"><span class="sender-span-1"> <img src="./profile/' .$sender_dp. ' " class="dp_display_sender"><br><br> ' .$rows_selected['message']. ' <br><br><span class="sender-span-2">' .$rows_selected['time']. ' - ' .$rows_selected['date']. ' <span class="sender-span-3">send</span> </span> </span></div>';
						    } else {

						    	$select_dp_receiver = "SELECT * FROM user WHERE id = '$sender_id'";
						    	$select_dp_receiver_result = mysqli_query($connect, $select_dp_receiver);

						    	$select_dp_receiver_rows = mysqli_fetch_assoc($select_dp_receiver_result);

						    	$receiver_dp = $select_dp_receiver_rows['profile_photo'];

						    	echo '<div class="input-group mb-3 bg-success receiver-div"><span class="receiver-span-1"><img src="./profile/' .$receiver_dp. ' " class="dp_display_receiver"> <br><br>' .$rows_selected['message']. ' <br><br><span class="receiver-span-2">' .$rows_selected['time']. ' - ' .$rows_selected['date']. ' <span class="receiver-span-3"> recieved</span></span></span></div>';
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
    </div>    
    <div class="fixed-footer">
        <form method="POST" action="send-message.php" id="sendingForm">
		    <div class="btn-group">
			        <input type="hidden" style="margin-left: 5px;" name="recieverid" value="<?php echo $user;?>">
			        <input type="text"  style="margin-left: 5px;"name="message" class="form-control" placeholder="Write message..." required>
		        <input type="submit" style="margin-left: 5px;" name="send" value="send" class="btn btn-info" id="btn">
		    </div>
	    </form>        
    </div>
</body>

<script type="text/javascript">
    
    
</script>
</html>