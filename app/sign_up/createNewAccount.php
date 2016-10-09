<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql = "INSERT INTO Users (username, firstname, lastname, email, address, city, state, zip);";

$validform = True;

//Is the name valid?
$name = explode(" ", $_POST['name']);
$firstname = $name[0];
$lastname = "";
if (count($name) > 1) {
	$lastname = $name[1];
}

//Is the email valid?
$email = $_POST['email'];
$emailarray = str_split($email);
$at = "";
$period = "";
for ($i = 0; $i <= count($emailarray)-1; $i++) {
	if ($emailarray[$i] == "@") {	
		$at = "@";
	}
	if ($emailarray[$i] == ".") {
		$period = ".";	
	}
}
if (($at == "") | ($period == "")) {
	$validform = False;
}

//Is the username valid?
$username = $_POST['username'];

//Is the password valid?
$password = $_POST['password'];
$password2 = $_POST['password2'];
if (strcmp($password, $password2) != 0) {
	$validform = False;
}

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$ccNumber = $_POST['ccNumber'];
$radio = $_POST['vote'];
$exp = $_POST['exp'];
$security = $_POST['security'];

echo $firstname;
echo "Connected successfully";
?> 
