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
			padding-top: 40px;
			padding-bottom: 60px;
		}

		.container {
			width: 80%;
			margin: 0 auto;
		}

		.fixed-header, .fixed-footer {
			width: 80%;
			position: fixed;
			background: blue;
			padding: 10px 0;
		}

		.fixed-header {
			top: 0;
		}

		.fixed-footer {
			bottom: 0;
		}

		.container p {
			line-height: 200px;
		}

		.outer {
			border: 1px;
			border-color: black;
		}
	</style>
</head>
<body>

	<div class="container outer">
		<div class="">
			<div class="fixed-header" style="color: brown;">
				<div class="">
					<h4 class="h4"><?php echo $reciever_name;?></h4>
				</div>
			</div>
			<div class="">
				<?php

		$select_message_query = "SELECT * FROM messages WHERE readerid = '$user' AND senderid = '$sender' OR readerid = '$sender' AND senderid = '$user'";
		$select_message_result = mysqli_query($connect, $select_message_query);

		//$rows_selected_display = mysqli_fetch_assoc($select_message_result);


		if (mysqli_num_rows($select_message_result) > 0) {
			while ($rows_selected = mysqli_fetch_assoc($select_message_result)) {
				?>

				<div>
					<p>
						<?php

						    if ($sender == $rows_selected['senderid']) {
						    	
						    	echo '<div class="input-group mb-3 bg-warning" style="width: 250px; float: right;"><span style="margin-left: 5px;">' .$rows_selected['message']. ' <br><span style="color: black; font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;">send</span></span></div><br><br><br>';
						    } else {

						    	//echo '<div class="input-group mb-3 bg-warning" style="width: 250px; float: left;"><span style="margin-left: 5px;">' .$rows_selected['message']. ' <br><span style="color: black; font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;">send</span></span></div>';

						    	echo '<div class="input-group mb-3 bg-success" style="width: 250px; float: left;><span style="text-align: left;">' .$rows_selected['message']. ' <span style="color: hotpink;  font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;"> recieve</span></span></div><br><br><br>';
						    }
						?>
					</p>
				</div>

				<?php
			}
		}

		?>
				

			</div>

			<div class="fixed-footer">
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