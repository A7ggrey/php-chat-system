<?php
session_start();

if (!isset($_SESSION['login_user'])) {
	
	header("location: ./../../");
	exit;
}

include('./../database/database.php');

$currentuser_id = $_SESSION['userid'];


echo "<h4><center>Followers</center><h4>";

//if (isset($_GET['friend'])) {
	
	if (isset($_GET['followers'])) {
	
	$friends_id = $_GET['followers'];

	$select_friends_followers = "SELECT user.*, followers.* FROM user INNER JOIN followers ON user.id = followers.follower_id WHERE followers.my_id = '$friends_id'";
	$select_friends_followers_result = mysqli_query($connect, $select_friends_followers);

	if (mysqli_num_rows($select_friends_followers_result) > 0) {
		
		while ($select_friends_followers_rows = mysqli_fetch_assoc($select_friends_followers_result)) {
			?>

			<div>
				<p>
					<?php echo "<img src='./profile/" .$select_friends_followers_rows['profile_photo']. "' style='width: 40px; height: 40px; border-radius: 100%;'> " .$select_friends_followers_rows['full_name'];?>
				</p>
			</div>

			<?php
		}
	} else {

	echo "No one has followed this profile yet!";
}
}
//}

?> 