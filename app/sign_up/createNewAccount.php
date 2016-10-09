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
	echo "Email address not formatted correctly. \n";
}

//Is the username valid?
$username = $_POST['username'];

//Is the password valid?
$password = $_POST['password'];
$password2 = $_POST['password2'];
if (strcmp($password, $password2) != 0) {
	$validform = False;
	echo "The passwords don't match. \n";
}

$address = $_POST['address'];
$city = $_POST['city'];

//Is the state valid?
$state = $_POST['state'];
$stateinitials = str_split($state);
if (count($stateinitials) != 2) {
	$validform = False;
	echo "State field is invalid. \n";
}
else {
	if (is_numeric($stateinitials[0]) | (is_numeric($stateinitials[1]))) {
		$validform = False;
		echo "State field is invalid. \n";
	}
}

//I'm not sure about how to check if a credit card number is valid.
$ccNumber = $_POST['ccNumber'];

//Check if expiration date is in the format 5/25
$exp = $_POST['exp'];
$monthday = explode("/", $exp);
if (count($monthday) == 2) {
	if (is_numeric($monthday[0]) & is_numeric($monthday[1])) {
		$month = (int) $monthday[0];
		$day = (int) $monthday[1];
		if (($month < 1) | ($month > 12) | ($day > 100)) {
			$validform = False;
			echo "Not a valid month or year. \n";
		}
	}
	else {
		$validform = False;
		echo "Format the date as MM/YY, please. \n";
	}
}
else {
	$validform = False;
	echo "Please format the date as MM/YY, please. \n";
}


$security = $_POST['security'];


$ecomm = "USE ecomm;";
if ($conn->query($ecomm) === TRUE) {
    if ($validform == False) {
		echo "Not a valid form. Sorry. Go back.";
	}
	else {
		$sql = "INSERT INTO user (username, firstname, lastname, email, address, city, state) VALUES ('$username', '$firstname', '$lastname', '$email', '$address', '$city', '$state');";
		if ($conn->query($sql) === TRUE) {
			echo "You have been registered! Welcome aboard, $firstname!";
		}
		else {
			echo "Could not insert the data." . $conn->error;
		}
	}
} else {
    echo "Error using database. " . $conn->error;
}



//echo "Connected successfully";

?> 
