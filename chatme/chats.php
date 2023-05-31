<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../');
	exit;
}

include('./../database/database.php');


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatme - Start a Chat</title>
	<link rel="stylesheet" type="text/css" href="./../others/bootstrap.css">
	<style type="text/css">
		body {
			margin-top: 150px;
			margin-left: 30px;
		}

		button {
			margin-top: 20px;
			border-top: none;
			border-bottom: none;
			border-left: none;
			border-right: none;
			background-color: white;
		}

		.verified {
			width: 20px;
			height: 20px;
			border-radius: 100%;
			border-style: double;
			border-color: rgb(160, 238, 95);
		}

		.profile_user {
			width: 40px;
			height: 40px;
			border-radius: 100%;
			border-style: double;
			border-color: rgb(77, 46, 161);
		}

	</style>
</head>
<body>

	<div>
		<a href="logout.php" class="btn btn-warning">Logout</a>
	</div>

	<?php

	$currentuser = $_SESSION['userid'];

	//echo $currentuser;

	$query = "SELECT * FROM user WHERE id <> '$currentuser'";
	$result = mysqli_query($connect, $query);

	if (mysqli_num_rows($result) > 0) {
		while($rows = mysqli_fetch_assoc($result)) {
			$verify_tick = $rows['verified'];
			$profile_photo = $rows['profile_photo'];
			$user_id_for_followers = $rows['id'];

		
		if ($verify_tick == 1) {
			
			echo '

			    <div>
			        <p>
				        <form method="GET" action="./read.php">
					        <img src="./profile/' .$profile_photo. '" class="profile_user">
					        <input type="hidden" name="user" value="' .$rows["id"]. '">
					        <button>&nbsp;&nbsp;' .$rows["full_name"]. '
					        </button>&nbsp;&nbsp;
					        <img src="./photos/verify.jpg" class="verified"> 
			            </form>
			        </p>
		        </div>

			';
		}

		/*<div>
			<p>
				<form method="GET" action="./read.php">
					<img src="./profile/<?php echo $profile_photo;?>" class="profile_user">
					<button name="user" value="<?php echo $rows['id'];?>">&nbsp;&nbsp;<?php echo $rows['full_name'];?>
					</button>&nbsp;&nbsp;
					    <?php if($verify_tick == 1) {?><img src="./photos/verify.jpg" class="verified"> 
			    </form>
			</p>
		</div>
		    
		<?php
	}*/

	//select and count number of followers
		    $select_followers = "SELECT * FROM followers WHERE my_id = '$user_id_for_followers'";
		    $select_followers_result = mysqli_query($connect, $select_followers);
		    $count_followers = mysqli_num_rows($select_followers_result);

		    echo "
		    <form method='GET' action='./friends.php'>
		        <input type='hidden' name='friends' value='" .$user_id_for_followers. "'>
		        <button>Followed By 
		            <span style='color: blue;'>" .$count_followers. " User</span>
		        </button>
		    </form>";

		    ?>
        <hr>

        <?php
}
}


	?>
</body>
</html>