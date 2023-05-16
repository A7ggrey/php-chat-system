<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../');
	exit;
}

$currentuser = $_SESSION['userid'];

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

		button {
			margin-top: 20px;
			border-top: none;
			border-bottom: none;
			border-left: none;
			border-right: none;
			background-color: white;
		}
	</style>
</head>
<body>

	

	<?php

	$currentuser = $_SESSION['userid'];

	include('./message-select.php');

	$query = "SELECT messages.*, user.* FROM messages INNER JOIN user ON messages.readerid = user.id WHERE messages.senderid = '$currentuser' OR messages.readerid = '$currentuser' GROUP BY user.id";
	$result = mysqli_query($connect, $query);

	$rows_before = mysqli_fetch_assoc($result);

	echo '<div><table class="table table-stripped"><thead><th>Messages</th><th><div class="btn-group">
		<a href="chats.php" class="btn btn-primary">Available Contacts</a>
		<a href="logout.php" class="btn btn-warning">Logout</a>
	</div></th><th style="color: darkblue;">Logged in as ' .$currentuser. '</th></thead><tbody>';

	if (mysqli_num_rows($result) > 0) {
		while($rows = mysqli_fetch_assoc($result)) {

		?>

		<tr>
			<td>
				<form method="GET" action="read.php">
					<button name="user" value="<?php echo $rows['readerid'];?>">
						&nbsp;&nbsp;<span style="font-weight: bold;"><?php echo $rows['username'];?></span><br>
						&nbsp;&nbsp;<span style="color: grey; font-size: 12px; margin-left: 30px;"><?php echo $rows['message'];?></span>
					</button>
				</form>
			</td>
		</tr> 

		<?php
	}
}


	?>
</tbody>
</table>
</div>

</body>
</html>