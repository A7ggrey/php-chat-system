<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "chatme";

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
	
	echo "<script>alert('Could not connect to the database!'); history.back(-1);</script>";
}
