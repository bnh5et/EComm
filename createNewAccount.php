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
$numchecker = str_split($_POST['name']);
for ($i = 0; $i <= count($numchecker)-1; $i++) {
	if (is_numeric($numchecker[$i])) {
		$validform = False;
		echo "Cannot have numbers in your name.";
	}
	if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $numchecker[$i])) {
		$validform = False;
		echo "Cannot have special characters in your name.";
	}
}
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
		if ($at == "@") {
			$validform = False;
			echo "Email address is not formatted correctly.";
		}
		else {
			$at = "@";
		}
	}
	if ($at == "@" & $emailarray[$i] == ".") {
		$period = ".";	
	}
}
if (($at == "") | ($period == "")) {
	$validform = False;
	echo "Email address not formatted correctly."."<br>";
}

//Is the username valid?
$username = $_POST['username'];

//Is the password valid?
$password = $_POST['password'];
$password2 = $_POST['password2'];
if (strcmp($password, $password2) != 0) {
	$validform = False;
	echo "The passwords don't match."."<br>";
}

$address = $_POST['address'];
$addresscomponents = explode(" ", $address);
if (count($addresscomponents) < 2) {
	$validform = False;
	echo "Address needs both the street number and street name.";
}
else {
	if (is_numeric($addresscomponents[0])) {
		for ($i = 1; $i < count($addresscomponents) - 1; $i++) {
			if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $addresscomponents[$i])) {
				$validform = False;
				echo "Cannot have special characters in street address.";
			}
			$streetaddresscharacters = str_split($addresscomponents[$i]);
			for ($j = 0; $j < count($streetaddresscharacters) - 1; $j++) {
				if (is_numeric($streetaddresscharacters[$j])) {
					$validform = False;
					echo "Cannot have numbers in street address.";
				}
			}
		}
	}
	else {
		$validform = False;
		echo "Address does not contain a street number.";
	}
}
$city = $_POST['city'];
$citycharacters = str_split($city);
if (count($citycharacters) == 1) {
	echo "Please enter full city name.";
}
//Is the state valid?
$state = $_POST['state'];
$stateinitials = str_split($state);
if (count($stateinitials) != 2) {
	$validform = False;
	echo "State field is invalid."."<br>";
}

//I'm not sure about how to check if a credit card number is valid. However, checking that all sixteen characters are digits should suffice for now.
$ccNumber = $_POST['ccNumber'];
$ccNumbers = str_split($ccNumber);
if (count($ccNumbers) != 16) {
	$validform = False;
	echo "Credit card does not contain enough digits."."<br>";
}
else {
	for ($i = 0; $i < 16; $i++) {
		if (!is_numeric($ccNumbers[$i])) {
			$validform = False;
			echo "The character $ccNumbers[$i] cannot be a digit in a credit card."."<br>";
		}
	}
}
//Check if expiration date is in the format 5/25
$exp = $_POST['exp'];
$monthday = explode("/", $exp);
if (count($monthday) == 2) {
	if (is_numeric($monthday[0]) & is_numeric($monthday[1])) {
		$month = (int) $monthday[0];
		$day = (int) $monthday[1];
		if (($month < 1) | ($month > 12) | ($day > 100)) {
			$validform = False;
			echo "Not a valid month or year."."<br>";
		}
	}
	else {
		$validform = False;
		echo "Format the date as MM/YY, please."."<br>";
	}
}
else {
	$validform = False;
	echo "Please format the date as MM/YY, please."."<br>";
}

//Checks that the security code is 3 numbers.
$security = $_POST['security'];
$securitynums = str_split($security);
if (count($securitynums) != 3) {
	echo "Security code must be three digits."."<br>";
}
else {
	for ($i = 0; $i < 3; $i++) {
		if (!is_numeric($securitynums[$i])) {
			echo "The character $securitynums[$i] cannot be a digit in a security code."."<br>";
		}
	}
}

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

?> 
<html>
<form action="sign_up.html">
    <input type="submit" value="Back" />
</form>
</html>
