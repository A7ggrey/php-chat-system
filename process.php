<?php

session_start();


include('./database/database.php');

if (isset($_POST['sign'])) {
	
	$full_name = mysqli_real_escape_string($connect, $_POST['full_name']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$othername = mysqli_real_escape_string($connect, $_POST['othername']);
	$password1 = password_hash($password, PASSWORD_DEFAULT);
	$profile_photo = 'a.png';
	$verified = 1;

	if (isset($_POST['private'])) {
		
		$private = 1;
	} else {

		$private = 0;
	}

	$query = "SELECT * FROM user WHERE username = '$email'";
	$result = mysqli_query($connect, $query);

	$query2 = "SELECT * FROM user WHERE othername = '$othername'";
	$result2 = mysqli_query($connect, $query2);



	if (mysqli_num_rows($result) > 0) {
		
		echo "<script>alert('Account already exists!'); history.back(-1);</script>";
	} else {
		
		if (mysqli_num_rows($result2) > 0) {
		
		echo "<script>alert('Username already exists!'); history.back(-1);</script>";
	   } else {


		$query1 = "INSERT INTO user(full_name, profile_photo, username, password, verified, private_account, othername) VALUES('$full_name', '$profile_photo', '$email', '$password1', '$verified', '$private', '$othername')";
	    $result1 = mysqli_query($connect, $query1);

	    if ($result1) {
	    	
	    	echo "<script>alert('user registered successfully.'); location.replace('./');</script>";
	    } else {

	    	echo "<script>alert('Something went wrong. Try again later!'); history.back(-1);</script>";
	    }
	}
}
}



if (isset($_POST['login'])) {
	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	$query = "SELECT * FROM user WHERE username = '$email'";
	$result = mysqli_query($connect, $query);

	if (mysqli_num_rows($result) > 0) {
		
		$rows = mysqli_fetch_assoc($result);

		$userid = $rows['id'];
		$username = $rows['email'];
		$password1 = $rows['password'];

		$password2 = password_verify($password, $password1);

		if ($password == $password2) {
			
			session_regenerate_id();

			$_SESSION['login_user'] = TRUE;
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $userid;

			header('location: ./chatme');
			exit;
		} else {

			echo "<script>alert('Wrong username or password!'); history.back(-1);</script>";
		}
	} else {

		echo "<script>alert('Wrong username or password!'); history.back(-1);</script>";
	}
}

?>