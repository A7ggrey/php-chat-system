<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header("location: ./../../");
	exit;
}

include('./../../database/database.php');

$current_user = $_SESSION['userid'];

$select_profile = "SELECT * FROM user WHERE id = '$current_user'";
$select_profile_result = mysqli_query($connect, $select_profile);

if (mysqli_num_rows($select_profile_result) > 0) {
	
	$select_profile_rows = mysqli_fetch_assoc($select_profile_result);

	$current_user_name = $select_profile_rows['full_name'];
	$current_user_username = $select_profile_rows['username'];
	$current_user_profile = $select_profile_rows['profile_photo'];
	$current_user_verify = $select_profile_rows['verified'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Me - <?php echo $current_user_name;?></title>
</head>
<body>

	<div>
		<p>
			<img src="./<?php echo $current_user_profile;?>" class="profile">
		</p>
	</div>

</body>
</html>