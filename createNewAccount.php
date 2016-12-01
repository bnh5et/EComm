<?php
include('email.php');

$servername = "localhost";
$user_name = "root";
$password = "";

require 'PHPMailerAutoload.php';

// Create connection
$conn = new mysqli($servername, $user_name, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


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
else {
	list($emailname, $mailDomain) = split("@", $email);
	if(myCheckDNSRR($mailDomain, "MX")) {
		//Doesn't send anything, but it works.
	}
	else {
		$validform = False;
		echo "The email domain is a bogus domain."."<br>";
	}
}


//Is the username valid?
$username = $_POST['username'];
$con = mysqli_connect($servername, $user_name, $password, "ecomm");

$query_username = "SELECT * FROM user WHERE username = '$username'";
$query_email = "SELECT * FROM user WHERE email = '$email'";

$checkUserName = $con->query($query_username);
$checkEmail = $con->query($query_email);

if ($checkUserName->num_rows > 0) {
	$validform = False;
	echo "Username already exists. Please choose a different one."."<br>";
}

if ($checkEmail->num_rows > 0) {
	$validform = False;
	echo "There is already an account associated with that email."."<br>";
}

$con->close();

//Is the password valid?
$password = $_POST['password'];
$password2 = $_POST['password2'];
$hash = password_hash($password, PASSWORD_BCRYPT);
if (strcmp($password, $password2) != 0) {
	$validform = False;
	echo "The passwords don't match."."<br>";
}

$address = $_POST['address'];
$addresscomponents = explode(" ", $address);
if (count($addresscomponents) < 2) {
	$validform = False;
	echo "Address needs both the street number and street name."."<br>";
}
else {
	if (is_numeric($addresscomponents[0])) {
		for ($i = 1; $i < count($addresscomponents) - 1; $i++) {
			if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $addresscomponents[$i])) {
				$validform = False;
				echo "Cannot have special characters in street address."."<br>";
			}
			$streetaddresscharacters = str_split($addresscomponents[$i]);
			//for ($j = 0; $j < count($streetaddresscharacters) - 1; $j++) {
			//	if (is_numeric($streetaddresscharacters[$j])) {
			//		$validform = False;
			//		echo "Cannot have numbers in street address."."<br>";
			//	}
			//}
		}
	}
	else {
		$validform = False;
		echo "Address does not contain a street number."."<br>";
	}
}
$city = $_POST['city'];
$citycharacters = str_split($city);
if (count($citycharacters) == 1) {
	echo "Please enter full city name."."<br>";
}
//Is the state valid?
$state = $_POST['state'];

$zip = $_POST['zip'];
$zipcharacters = str_split($zip);
if (count($zipcharacters) != 5) {
	$validform = False;
	echo "Not a valid zip code."."<br>";
}
else {
	for ($i = 0; $i < 5; $i++) {
		if (!is_numeric($zipcharacters[$i])) {
			$validform = False;
			echo "Zip code must only consist of numbers."."<br>";
		}
	}
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
		$year = (int) $monthday[1];
		if (($month < 1) | ($month > 12)) {
			$validform = False;
			echo "Please enter a valid month."."<br>";
		}
		else if (($year < 16)) {
			$validform = False;
			echo "Credit card has expired."."<br>";
		}
		else if (($year == 16) & ($month < 11)) {
			$validform = False;
			echo "Credit card has expired."."<br>";
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
		echo "Not a valid form. Sorry. Go back.".'<br>';
	}
	else {
		$creditcardnumber = (int) $ccNumber;
		$sql = "INSERT INTO user (credits, username, firstname, lastname, password, email, address, city, state, zip, ccNumber, exp, security) VALUES (0, '$username', '$firstname', '$lastname', '$hash', '$email', '$address', '$city', '$state', '$zip', '$ccNumber', '$exp', '$security');";
		if ($conn->query($sql) === TRUE) {
			echo "You have been registered! Welcome aboard, $firstname!".'<br>';

			$mail = new PHPMailer;
			$mail->isSendmail();

			$mail->From = "brianahart95@gmail.com";
			$mail->FromName = "Briana Hart";
			$mail->addAddress($_POST['email'], $_POST['name']);
			$mail->isHTML(true);
			$mail->Subject = 'Thanks for Signing Up!';
			$mail->Body    = '<i>Dear user,<br>Thank you for signing up!</i>';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}

		}
		else {
			echo "Could not insert the data. " . $conn->error;
		}


	}
} else {
	echo "Error using database. " . $conn->error;
}

?>
<html>
<form action="sign_up.php">
	<input type="submit" value="Back" />
</form>
</html>
