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

$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];
$phone_number=$_POST['phone_number'];
$user_name=$_POST['user_name'];
$email=$_POST['e_mail'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$hash_password=md5($password);
$conf_hash_password=md5($confirm_password);

$sql_1 = "SELECT * FROM beautiful_form_sign_up_table WHERE user_name = '$user_name'";
//$sql_pass = "SELECT * FROM beautiful_form_sign_up_table WHERE password = '$password'";
$result = mysqli_query($conn, $sql_1);
//$result_pass = mysql_query($conn, $sql_pass);

if (mysqli_num_rows($result) > 0) {
	echo "Sorry... user name already taken!";
}elseif ($confirm_password != $password) {
			echo "Confirm password incorrect";
}elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "Wrong Email format";
}else{

		$sql = "INSERT INTO beautiful_form_sign_up_table (first_name, middle_name, last_name, phone_number, user_name, password, e_mail)
		VALUES ('$first_name', '$middle_name', '$last_name', '$phone_number', '$user_name', '$hash_password', '$email')";

		if (mysqli_query($conn, $sql)) {
		  echo "Account created successfully";
		}else {
		  echo "Error creating account: " . $sql . "<br>" . mysqli_error($conn);
		}

}
mysqli_close($conn);
?>