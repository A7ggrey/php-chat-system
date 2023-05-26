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


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Creating Fixed Header and Footer with CSS</title>
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
    	width: 250px;
    	background-color: lightblue;
    }

    .sender-span-1 {
    	margin-left: 7px;
    }

    .sender-span-2 {
    	 color: black;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 margin-left: 100px;
    }

    .sender-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    }

    .receiver-div {
    	width: 250px;
    	background-color: lightgreen;
    }

    .receiver-span-1 {
    	margin-left: 7px;
    }

    .receiver-span-2 {
    	 color: black;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 margin-left: 100px;
    }

    .receiver-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
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
    	width: 350px;
    	float: right;
    	background-color: lightblue;
    	padding-top: 10px;
    	padding-left: 4px;
    	margin: 10px;
    	margin-bottom: 20px;
    }

    .sender-span-1 {
    	margin-left: 7px;
    	font-size: 30px;
    }

    .sender-span-2 {
    	 color: black;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 margin-left: 100px;
    	 font-size: 18px;
    }

    .sender-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 font-size: 18px;
    }

    .receiver-div {
    	width: 350px;
    	float: left;
    	background-color: lightgreen;
    	padding-top: 10px;
    	padding-left: 4px;
    	margin: 10px;
    	margin-bottom: 20px;
    }

    .receiver-span-1 {
    	margin-left: 7px;
    	font-size: 30px;
    }

    .receiver-span-2 {
    	 color: black;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 margin-left: 100px;
    	 font-size: 18px;
    }

    .receiver-span-3 {
    	 color: blue;
    	 font-size: 9px;
    	 margin-top: 7px;
    	 font-size: 18px;
    }
    }
</style>
</head>
<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                <h4><?php echo $reciever_name;?></h4>
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

				$reciever_id = $rows_selected[''];
				$sender_id = $rows_selected[''];
				?>

				<div>
					<p>
						<?php

						    if ($sender == $rows_selected['senderid']) {
						    	
						    	echo '<div class="input-group mb-3 sender-div"><span class="sender-span-1">' .$rows_selected['message']. ' <br><span class="sender-span-2">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span class="sender-span-3">send</span></span></div>';
						    } else {

						    	//echo '<div class="input-group mb-3 bg-warning" style="width: 250px; float: left;"><span style="margin-left: 5px;">' .$rows_selected['message']. ' <br><span style="color: black; font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;">send</span></span></div>';

						    	echo '<div class="input-group mb-3 bg-success receiver-div"><span class="receiver-span-1">' .$rows_selected['message']. ' <span class="receiver-span-2">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span class="receiver-span-3"> recieve</span></span></div>';
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
        <form method="POST" action="send-message.php">
		    <div class="btn-group">
			        <input type="hidden" style="margin-left: 5px;" name="recieverid" value="<?php echo $user;?>">
			        <input type="text"  style="margin-left: 5px;"name="message" class="form-control" placeholder="Write message..." required>
		        <input type="submit" style="margin-left: 5px;" name="send" value="send" class="btn btn-info" id="btn">
		    </div>
	    </form>        
    </div>
</body>
</html>