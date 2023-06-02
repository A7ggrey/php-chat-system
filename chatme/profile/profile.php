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
    
   $current_user = $_SESSION['userid'];
if (!isset($_GET['opid'])) {
	
	

    $select_profile = "SELECT * FROM user WHERE id = '$current_user'";
    $select_profile_result_current = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result_current) > 0) {
	
	    $select_profile_rows = mysqli_fetch_assoc($select_profile_result_current);

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
    $select_profile_result_other = mysqli_query($connect, $select_profile);

    if (mysqli_num_rows($select_profile_result_other) > 0) {
	
	    $select_profile_rows = mysqli_fetch_assoc($select_profile_result_other);

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
			<?php

			    $select_unfollow = "SELECT * FROM followers WHERE my_id = '$follow_me' AND follower_id = '$current_user'";
			    $select_unfollow_result = mysqli_query($connect, $select_unfollow);
			    $count_unfollow = mysqli_num_rows($select_unfollow_result);


			    if ($count_unfollow > 0) {
			    	
			    	?>

			    	<p>You follow this account.</p>

			    	<form method="POST" action="follower.php">
				        <input type="hidden" name="unfollow_id" value="<?php echo $follow_me;?>">
				        <input type="submit" name="unfollower_btn" value="Unfollow">
			        </form>

			    <?php

			    } else {
			    	?>

			    	<p>You don't follow this account.</p>

			    	<form method="POST" action="follower.php">
				        <input type="hidden" name="follow_id" value="<?php echo $follow_me;?>">
				        <input type="submit" name="follower_btn" value="Follow">
			        </form>

			        <?php
			    }

			?>

			<?php

			    if (isset($select_profile_result_current)) {
			    	
			    	if (mysqli_num_rows($select_profile_result_current) > 0) {

			    	echo '<br>
			    	<a href="update_profile.php">Update Profile</a>';

			    }
			    }
			?>
		</p>
		
	</div>

</body>
</html>