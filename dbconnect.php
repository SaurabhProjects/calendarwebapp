


<?php


$server = "us-cdbr-iron-east-03.cleardb.net";
$username = "bd312311a5634b";
$password = "65a72716";
$db ="heroku_e2e6483ca0ee17e";

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>