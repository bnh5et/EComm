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
<?php 
	session_start();
	?>
<div class="background">
    <div class="main-panel">
        <div class="block-design"></div>

        <img class="logo" src="./img/logo.png">

        <nav>
            <a href="index.php">HOME</a>
            <a href="purchase.php">SHOP</a>
            <a href="about_us.php">ABOUT US</a>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false ): ?>
		        <a href="sign_in.php">SIGN IN</a>
			<?php else: ?>
				<a href="sign_out.php">SIGN OUT</a>
			<?php endif; ?>
	           

        </nav>
</body>
<?php
	echo $_SESSION['username'];
	?>