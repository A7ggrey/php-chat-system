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

	$select_chats = "SELECT * FROM chats WHERE user_id = '$reciever' AND current_user_id = 'sender'";
	$select_chats_result = mysqli_query($connect, $select_chats);

	if (mysqli_num_rows($select_chats_result) > 0) {

	$send_message_query = "INSERT INTO messages(readerid, senderid, message, date, time) VALUES('$reciever', '$sender', '$message', '$date', '$time')";
	$send_message_result = mysqli_query($connect, $send_message_query);

	if ($send_message_result) {
		
		header("location: ./read.php?user=".$reciever. "");
		exit;
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
		
		header("location: ./read.php?user=".$reciever. "");
		exit;
	} else {

		echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
	}
	}
}}

?>