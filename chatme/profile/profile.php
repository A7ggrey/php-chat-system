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

if (!isset($_GET['opid'])) {
	
	$current_user = $_SESSION['userid'];

    $select_profile = "SELECT * FROM user WHERE id = '$current_user'";
    $select_profile_result = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result) > 0) {
	
	    $select_profile_rows = mysqli_fetch_assoc($select_profile_result);

	    $current_user_name = $select_profile_rows['full_name'];
	    $current_user_username = $select_profile_rows['username'];
	    $current_user_profile = $select_profile_rows['profile_photo'];
	    $current_user_verify = $select_profile_rows['verified'];
} else {

	//echo "<script>history.back(-1);</script>";
}

} else {

	$opid = $_GET['opid'];

	$select_profile = "SELECT * FROM user WHERE id = '$opid'";
    $select_profile_result = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result) > 0) {
	
	    $select_profile_rows = mysqli_fetch_assoc($select_profile_result);

	    $current_user_name = $select_profile_rows['full_name'];
	    $current_user_username = $select_profile_rows['username'];
	    $current_user_profile = $select_profile_rows['profile_photo'];
	    $current_user_verify = $select_profile_rows['verified'];
} else {

	//echo "<script>history.back(-1);</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Me - <?php echo $current_user_name;?></title>
</head>
<style type="text/css">
	.profile_user {
			width: 40px;
			height: 40px;
			border-radius: 100%;
			border-style: double;
			border-color: rgb(77, 46, 161);
		}
</style>
<body>

	<div>
		<p>
			<img src="./<?php echo $current_user_profile;?>" class="profile_user">
		</p>
		
		<p>
			<?php echo $current_user_name;?>
		</p>
		
		<p>
			<?php echo $current_user_username;?>
		</p>

		<p>
			<?php

			$select_followers = "SELECT * FROM followers WHERE my_id = '$follow_me'";
			$select_followers_result = mysqli_query($connect, $select_followers);

			$count_followers = mysqli_num_rows($select_followers_result);

			echo "Followed By <span style='color: blue;'>" .$count_followers. "</span> User";

			?>
		</p>

		<p>
			<form method="POST" action="follower.php">
				<input type="hidden" name="follow_id" value="<?php echo $follow_me;?>">
				<input type="submit" name="follower_btn" value="Follow">
			</form>
		</p>
		
	</div>

</body>
</html>