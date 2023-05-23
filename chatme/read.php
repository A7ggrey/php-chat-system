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
					<p>
						<?php

						    if ($sender == $rows_selected['senderid']) {
						    	
						    	echo '<div style="text-align: right;">' .$rows_selected['message']. '<span style="color: red;">' .$rows_selected['time']. '' .$rows_selected['date']. '</span>';
						    } else {

						    	echo '<div style="text-align: left;">' .$rows_selected['message']. '<span style="color: blue;">' .$rows_selected['time']. '' .$rows_selected['date']. '</span>';
						    }
						?>
					</p>
				</div>

				<?php
			}
		}

		?>
	</div>

	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<h4 class="h4">Login Here!</h4>
			</div>
			<form method="POST" action="process.php">
				<div class="card-body">
				<div class="input-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>

				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>

				<div class="input-group mb-3">
					<input type="submit" name="login" value="Login" class="btn btn-success">
				</div>
				<a href="register.html" class="alert-link text-decoration-none">Create an account</a>
			</div>
			</form>

			<div class="card-footer">
				<p><span style='color: orange;'>username 1</span>: aggrey@jrey.co.ke || <span style='color: orange;'>password 1</span>: aggrey123</p>
				<p><span style='color: orange;'>username 2</span>: kiprop@jrey.co.ke || <span style='color: orange;'>password 2</span>: kiprop123</p>
			</div>
		</div>
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