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
$email = $_REQUEST['email'];
$sql = "SELECT * FROM beautiful_form_sign_up_table WHERE e_mail='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "Welcome ".$user_name."!!";
}elseif (empty($email)) {
	echo "Input your Email";
}else {
	echo "Didin't find user";
}
mysqli_close($conn);

?>