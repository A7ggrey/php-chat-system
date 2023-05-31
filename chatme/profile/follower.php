<?php
session_start();

if (!isset($_SESSION['login_user'])) {
	
	header("location: ./../../");
	exit;
}

include('./../../database/database.php');

date_default_timezone_set("Africa/Nairobi");

$date = date('d/m/Y');
$time = date('h:i:sa');


if (isset($_POST['follower_btn'])) {
	
	$follow_id = $_POST['follow_id'];
	$follower_id = $_SESSION['userid'];

	$select_follower = "SELECT * FROM followers WHERE my_id = '$follow_id' AND follower_id = '$follower_id'";
	$select_follower_result = mysqli_query($connect, $select_follower);

	if (mysqli_num_rows($select_follower_result) == 1) {
		
		echo "<script>history.back(-1);</script>";
	} else {

		$insert_follower = "INSERT INTO followers(my_id, follower_id, followed_date, followed_time) VALUES('$follow_id', '$follower_id', '$date', '$time')";
		$insert_follower_result = mysqli_query($connect, $insert_follower);

		if ($insert_follower_result) {
			
			echo "<script>history.back(-1);</script>";
		}
	}
}





    if (isset($_POST['unfollower_btn'])) {
    	
    	$unfollow_id = $_POST['unfollow_id'];
	    $follower_id = $_SESSION['userid'];

	    $select_follower = "SELECT * FROM followers WHERE my_id = '$unfollow_id' AND follower_id = '$follower_id'";
	    $select_follower_result = mysqli_query($connect, $select_follower);

	if (mysqli_num_rows($select_follower_result) != 1) {
		
		echo "<script>history.back(-1);</script>";
	} else {

		$insert_follower = "DELETE FROM followers WHERE my_id = '$unfollow_id' AND follower_id = '$follower_id'";
		$insert_follower_result = mysqli_query($connect, $insert_follower);

		if ($insert_follower_result) {
			
			echo "<script>history.back(-1);</script>";
		}
	}
    }

?>