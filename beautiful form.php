<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "awake";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$user_name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];
$password=md5($password);
// $password_ver = password_verify($password, 'password')

$sql = "SELECT * FROM beautiful_form_sign_up_table WHERE user_name = '$user_name' and password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "Welcome ".$user_name."!!";
}elseif (empty($password) and empty($user_name)) {
	echo "Input your username and password";
}else {
	echo "Incorrect Username or Password";
}
mysqli_close($conn);

?>