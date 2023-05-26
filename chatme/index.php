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
<body class="container">

<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-left">
				<a href="./profile/profile.php" class="btn btn-info">My Profile</a>
				<a href="./chats.php" class="btn btn-primary">Available Contacts</a>
		        <a href="./logout.php" class="btn btn-danger">Logout</a>
			</div>
		<div class="card-body">
				<?php

	$currentuser = $_SESSION['userid'];

	//include('./message-select.php');

	//$query = "SELECT messages.*, user.* FROM messages INNER JOIN user ON messages.readerid = user.id WHERE messages.senderid = '$currentuser' OR messages.readerid = '$currentuser' GROUP BY user.id";

	$query_chats = "SELECT chats.*, user.* FROM user INNER JOIN chats ON user.id = chats.user_id WHERE chats.current_user_id = '$currentuser' OR chats.user_id = '$currentuser' ORDER BY chats.chat_time ASC";
	$result_chats = mysqli_query($connect, $query_chats);

	//$rows_before = mysqli_fetch_assoc($result_chats);

	if (mysqli_num_rows($result_chats) > 0) {

		while($rows_chats = mysqli_fetch_assoc($result_chats)) {

			$my_id = $rows_chats['current_user_id'];
			$your_id = $rows_chats['user_id'];
			//$user_id_two = $rows_chats['']

			if ($my_id == $currentuser) {
				
				$id_to_display = $your_id;
			} else {

				$id_to_display = $my_id;
			}

		?>

		<div class="input-group mb-3">
			<p>
				<form method="GET" action="read.php">
					<button name="user" value="<?php echo $id_to_display;?>">
						&nbsp;&nbsp;
						<span style="font-weight: bold;">
							<?php 
							//if ($id_to_display == $your_id) {
							   	
							   	$select_your_id = "SELECT * FROM user WHERE id = '$id_to_display'";
							   	$select_your_id_result = mysqli_query($connect, $select_your_id);

							   	if (mysqli_num_rows($select_your_id_result) > 0) {
							   		
							   		$select_your_id_rows = mysqli_fetch_assoc($select_your_id_result);
							   			?>

							   			<?php echo $select_your_id_rows['full_name'];?></span><br>

							   			<?php
							   		}
							   	//}
							   //}
							   ?>  

							   
						&nbsp;&nbsp;<span style="color: grey; font-size: 12px; margin-left: 30px;">message</span>
					</button>
				</form>
			</p>
		</div>
		<hr>

		<?php
	}
}


	?>
	</div>
</div>

</body>
</html>