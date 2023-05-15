<?php

$query_select_message = "SELECT * FROM messages WHERE readerid = '$currentuser'";
$result_select_message = mysqli_query($connect, $query_select_message);


if (mysqli_num_rows($result_select_message) > 0) {
	while ($message_rows = mysqli_fetch_assoc($result_select_message)) {
	    $messageid = $message_rows['id'];
	    $message = $message_rows['message'];

}
} else {

	$messageid = "";
	$message = "";

	echo "0 Messages!";
}


?>