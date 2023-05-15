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
	<title>Chatme - Chats</title>
	<link rel="stylesheet" type="text/css" href="./../others/bootstrap.css">
	<style type="text/css">
		body {
			margin-top: 150px;
			margin-left: 30px;
		}
	</style>
</head>
<body>

	<div>
		<a href="logout.php" class="btn btn-warning">Logout</a>
	</div>

	<?php

	$currentuser = $_SESSION['userid'];

	$query = "SELECT * FROM user WHERE id <> '$currentuser'";
	$result = mysqli_query($connect, $query);

	if (mysqli_num_rows($result) > 0) {
		while($rows = mysqli_fetch_assoc($result)) {

		?>

		<div>
			<form method="GET" action="read.php">
				<p><button name="user" value="<?php echo $rows['id'];?>">&nbsp;&nbsp;<?php echo $rows['username'];?></button></p>
			</form>
		</div>

		<?php
	}
}


	?>

</body>
</html>