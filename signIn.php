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
$query = "SELECT * FROM user WHERE username='$checkusername'";
$result = $conn->query($query);
//echo $result->num_rows;

if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$databasehash = $row['password'];
	if (password_verify($checkpassword, $databasehash)) {
	//echo "Hello! \n";
	//echo "Username". $row['username'];
	//echo "Password". $row['password'];
		echo "Welcome, $checkusername! You have successfully connected to MySQL! Sadly, nothing else
		has actually been implemented yet!";
		$_SESSION['username'] = $checkusername;
		$_SESSION['credit'] = $row['credits'];
		$_SESSION['password'] = $checkpassword;
		$_SESSION['loggedin'] = true;
		echo $_SESSION['password'];
	    header('Location: '."home.php");
	}
	else{
	echo "Username or password not found";
    $conn->close();
	
	
	
}
	//session_write_close();
	//session_regenerate_id(true);
}
else{
	echo "Username or password not found";
    $conn->close();
	
	
	
}

?>