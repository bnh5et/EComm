<!DOCTYPE html>
<html lang="en">
<head>
	<title>TextTrade</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="background">
	<div class="main-panel">
		<div class="block-design"></div>
		<img class="logo" src="./img/logo.png">
		<nav>
			<a href="index.php">HOME</a>
			<a href="purchase.php">SHOP</a>
			<a href="about_us.php">ABOUT US</a>
			<a href="sign_in.php">SIGN IN</a>
		</nav>

		<div class="signup-page" style="padding: 20px;">
			<h3 style="text-align: center;">SIGN UP</h3>
			<form action="createNewAccount.php" method="post">
				<p>Name:</p><input type="text" name="name" id="name" size="50">
				<p></p>
				<p>Email Address:</p><input type="text" name="email" id="email" size="50">
				<p></p>
				<p>Username:</p><input type="text" name="username" id="username" size="50">
				<p></p>
				<p>Password:</p><input type="password" name="password" id="password" size="50">
				<p></p>
				<p>Confirm Password:</p><input type="password" name="password2" id="password2" size="50">
				<p></p>
				<p>Address:</p><input type="text" name="address" id="address" size="50">
				<p></p>
				<p>City:</p><input type="text" name="city" id="city" size="50">
				<p></p>
				<div class="form-group">
					<label for="state" style="font-weight: normal">State:</label>
					<select class="form-control" name="state" id="state" style="max-height: 50px; max-width: 400px;">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
				</div>
				<p></p>
				<p>Zip Code:</p><input type="text" name="zip" id="zip" size="50">
				<p></p>
				<h3>Banking Information</h3>
				<p>Credit Card Number:</p><input type="creditcard" name="ccNumber" id="ccNumber" size="50" onChange="return ccNumber()">
				<p></p>
				<p>Expiration Date:</p><input type="text" name="exp" id="exp" size="50">
				<p></p>
				<p>Security Code:</p><input type="text" name="security" id="security" size="50">
				<p></p>
				<input type="Submit" value="Submit">
			</form>
		</div>

		<div class="block-design"></div>
	</div>
</div>
</body>

