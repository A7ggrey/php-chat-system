<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../');
	exit;
}

include('./../database/database.php');

$user = $_GET['user'];
$sender = $_SESSION['userid'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./../others/bootstrap.css">
	<title>Read messages - User</title>
	<style type="text/css">
		body {
			margin-top: 150px;
			margin-left: 30px;
		}
	</style>
</head>
<body>

	<div>
		<?php

		$select_message_query = "SELECT * FROM messages WHERE readerid = '$user' AND senderid = '$sender' OR readerid = '$sender' AND senderid = '$user'";
		$select_message_result = mysqli_query($connect, $select_message_query);

		if (mysqli_num_rows($select_message_result) > 0) {
			while ($rows_selected = mysqli_fetch_assoc($select_message_result)) {
				?>

				<div>
					<p><?php echo $rows_selected['message'];?> <span style="color: blue;"><?php echo $rows_selected['time'];?> <?php echo $rows_selected['date'];?></span></p>
				</div>

				<?php
			}
		}

		?>
	</div>

	<form method="POST" action="send-message.php">
		<div class="btn-group">
			<input type="hidden" name="recieverid" value="<?php echo $user;?>">
			<input type="text" name="message" class="form-control" placeholder="Write message...">
		    <input type="submit" name="send" value="send" class="btn btn-info">
		</div>
	</form>
	

</body>
</html>