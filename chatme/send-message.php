<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../');
	exit;
}

include('./../database/database.php');

if (isset($_POST['send'])) {
	
	$message = mysqli_real_escape_string($connect, $_POST['message']);
	$reciever = mysqli_real_escape_string($connect, $_POST['recieverid']);
	$sender = $_SESSION['userid'];

	date_default_timezone_set("Africa/Nairobi");
	$date = date("d/m/Y");
	$time = date("h:i:sa");

	$select_chats = "SELECT * FROM chats WHERE user_id = '$reciever' AND current_user_id = '$sender' OR user_id = '$sender' AND current_user_id = '$reciever'";
	$select_chats_result = mysqli_query($connect, $select_chats);

	if (mysqli_num_rows($select_chats_result) > 0) {

	   //update chat date and time to for them to be arranged from the latest to the earilest as they are recieved 
	   $update_chats = "UPDATE chats SET chat_date = '$date', chat_time = '$time' WHERE ";
	   $update_chats_result = mysqli_query($connect, $update_chats);

	$send_message_query = "INSERT INTO messages(readerid, senderid, message, date, time) VALUES('$reciever', '$sender', '$message', '$date', '$time')";
	$send_message_result = mysqli_query($connect, $send_message_query);

	if ($send_message_result) {

		//select from table messages to use message id in the read messages table		
		$read_message_query = "SELECT * FROM messages WHERE readerid = '$reciever' AND senderid = '$sender' ORDER BY id DESC LIMIT 1";
		$read_message_result = mysqli_query($connect, $read_message_query);

		if (mysqli_num_rows($read_message_result) > 0) {

			$read_message_rows = mysqli_fetch_assoc($read_message_result);

			$message_id = $read_message_rows['id'];
			$message_status = 0;
			$null = "";
			
			//inserting a new record into the read messages table (to separate read fron unread messages)
			$insert_read_message = "INSERT INTO readmessages(messageid, sender_id, reciever_id, status, send_date, send_time, read_date, read_time) VALUES('$message_id', '$sender', '$reciever', '$message_status', '$date', '$time', '$null', '$null')";
			$insert_read_result = mysqli_query($connect, $insert_read_message);

			if ($insert_read_result) {
				
				header("location: ./read.php?user=".$reciever. "");
		        exit;
			} else {
				echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
			}
		}
	} else {

		echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
	}
} else {

	$insert_chats = "INSERT INTO chats(user_id, chat_date, chat_time, current_user_id) VALUES('$reciever', '$date', '$time', '$sender')";
	$insert_chats_result = mysqli_query($connect, $insert_chats);

	if ($insert_chats_result) {
		
		$send_message_query = "INSERT INTO messages(readerid, senderid, message, date, time) VALUES('$reciever', '$sender', '$message', '$date', '$time')";
	$send_message_result = mysqli_query($connect, $send_message_query);

	if ($send_message_result) {
		
		$read_message_query = "SELECT * FROM messages WHERE readerid = '$reciever' AND senderid = '$sender' ORDER BY id DESC LIMIT 1";
		$read_message_result = mysqli_query($connect, $read_message_query);

		if (mysqli_num_rows($read_message_result) > 0) {

			$read_message_rows = mysqli_fetch_assoc($read_message_result);

			$message_id = $read_message_rows['id'];
			$message_status = 0;
			$null = "";
			
			$insert_read_message = "INSERT INTO readmessages(messageid, sender_id, reciever_id, status, send_date, send_time, read_date, read_time) VALUES('$message_id', '$sender', '$reciever', '$message_status', '$date', '$time', '$null', '$null')";
			$insert_read_result = mysqli_query($connect, $insert_read_message);

			if ($insert_read_result) {
				
				header("location: ./read.php?user=".$reciever. "");
		        exit;
			} else {
				echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
			}
		}
	} else {

		echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
	}
	}
}}

?>