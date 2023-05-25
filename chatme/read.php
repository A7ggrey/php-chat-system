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

$reciever_name = $select_user_rows['full_name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Creating Fixed Header and Footer with CSS</title>
<style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    body{        
        padding-top: 60px;
        padding-bottom: 40px;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background: brown;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
    }    
    /* Some more styles to beutify this example */
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }
</style>
</head>
<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                <h4><?php echo $reciever_name;?></h4>
            </nav>
        </div>
    </div>
    <div class="container">
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
						    	
						    	echo '<div class="input-group mb-3" style="width: 250px; float: right; background-color: lightblue;"><span style="margin-left: 7px;">' .$rows_selected['message']. ' <br><span style="color: black; font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;">send</span></span></div><br><br><br>';
						    } else {

						    	//echo '<div class="input-group mb-3 bg-warning" style="width: 250px; float: left;"><span style="margin-left: 5px;">' .$rows_selected['message']. ' <br><span style="color: black; font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;">send</span></span></div>';

						    	echo '<div class="input-group mb-3 bg-success" style="width: 250px; float: left; background-color: lightgreen;><span style="margin-left: 7px;">' .$rows_selected['message']. ' <span style="color: hotpink;  font-size: 9px; margin-top: 7px; margin-left: 100px;">' .$rows_selected['time']. ' ' .$rows_selected['date']. ' </span><span style="color: blue; font-size: 9px; margin-top: 7px;"> recieve</span></span></div><br><br><br>';
						    }
						?>
					</p>
				</div>

				<?php
			}
		} else {

			echo '<div style="background-color: black; color: white; text-align: center; margin-top: 17px;">
			            <span>Start a New Chat</span>
			      </div>';
		}

		?>
    </div>    
    <div class="fixed-footer">
        <form method="POST" action="send-message.php">
		    <div class="btn-group">
			        <input type="hidden" style="margin-left: 5px;" name="recieverid" value="<?php echo $user;?>">
			        <input type="text"  style="margin-left: 5px;"name="message" class="form-control" placeholder="Write message..." required>
		        <input type="submit" style="margin-left: 5px;" name="send" value="send" class="btn btn-info">
		    </div>
	    </form>        
    </div>
</body>
</html>