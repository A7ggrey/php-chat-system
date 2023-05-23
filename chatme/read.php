<?php

session_start();

if (!isset($_SESSION['login_user'])) {
	
	header('location: ./../');
	exit;
}

include('./../database/database.php');

$user = $_GET['user'];
$sender = $_SESSION['userid'];

$select_user_details = "SELECT * FROM user WHERE id = '$user'";
$select_user_result = mysqli_query($connect, $select_user_details);

$select_user_rows = mysqli_fetch_assoc($select_user_result);

$reciever_name = $select_user_rows['username'];


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
<body class="container">

	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header bg-info" style="color: brown;">
				<h4 class="h4"><?php echo $reciever_name;?></h4>
			</div>
			<div class="card-body">
				<?php

		$select_message_query = "SELECT * FROM messages WHERE readerid = '$user' AND senderid = '$sender' OR readerid = '$sender' AND senderid = '$user'";
		$select_message_result = mysqli_query($connect, $select_message_query);

		$rows_selected_display = mysqli_fetch_assoc($select_message_result);


		if (mysqli_num_rows($select_message_result) > 0) {
			while ($rows_selected = mysqli_fetch_assoc($select_message_result)) {
				?>

				<div>
					<p>
						<?php

						    if ($sender == $rows_selected['senderid']) {
						    	
						    	echo '
						    	<div class="input-group mb-3" style="text-align: right;">' .$rows_selected['message']. '<span style="color: red;">' .$rows_selected['time']. '' .$rows_selected['date']. '</span>';
						    } else {

						    	echo '
						    	<div class="input-group mb-3" style="text-align: left;">' .$rows_selected['message']. '<span style="color: blue;">' .$rows_selected['time']. '' .$rows_selected['date']. '</span>';
						    }
						?>
					</p>
				</div>

				<?php
			}
		}

		?>
				

			</div>

			<div class="card-footer bg-default">
				<form method="POST" action="send-message.php">
		            <div class="btn-group">
			            <input type="hidden" name="recieverid" value="<?php echo $user;?>">
			            <input type="text" name="message" class="form-control" placeholder="Write message...">
		                <input type="submit" name="send" value="send" class="btn btn-info">
		            </div>
	            </form>
			</div>
		</div>
	</div>
</body>
</html>