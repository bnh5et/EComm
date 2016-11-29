<?php
session_start();
$servername = "localhost";
$user_name = "root";
$password = "";

$conn = mysqli_connect($servername,$user_name,$password,"ecomm");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$checkusername = $_POST['checkUsername'];
$checkpassword = $_POST['checkPassword'];
	//Form the SQL query
if (!mysqli_query($conn, "SELECT * FROM user WHERE username='$checkusername' AND password = '$checkpassword'"))
{
    echo "Username or password not found";
}
else{
	$row = $result->fetch_assoc();
	echo "Welcome, $checkusername! You have successfully connected to MySQL! Sadly, nothing else
	has actually been implemented yet!";
	$_SESSION['username'] = $checkusername;
	//$_SESSION['type'] = $row['user_type'];
	$_SESSION['password'] = $checkpassword;
	$_SESSION['loggedin'] = true;
	header('Location: '."home.php");
}

?>