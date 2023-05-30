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

		?>

		<div>
			<form method="GET" action="read.php">
				<p><button name="user" value="<?php echo $rows['id'];?>">&nbsp;&nbsp;<?php echo $rows['full_name'];?>&nbsp;&nbsp;
					<?php if($verify_tick == 1) {?><img src="./photos/verify.jpg" class="verified"></button></p>
			</form>
		</div>

		<?php
	}
}
}


	?>

</body>
</html>