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

	date_default_timezone_set("Africa/Nairobi");

	$date = date("d/m/Y");
	$time = date("h:i:sa");

	$sender = $_SESSION['userid'];

	$send_message_query = "INSERT INTO messages(readerid, senderid, message, date, time) VALUES('$reciever', '$sender', '$message', '$date', '$time')";
	$send_message_result = mysqli_query($connect, $send_message_query);

	if ($send_message_result) {
		
		header("location: ./read.php?user=".$reciever. "");
		exit;
	} else {

		echo "<script>alert('Could not send message. Try again!'); history.back(-1);</script>";
	}
}

?>