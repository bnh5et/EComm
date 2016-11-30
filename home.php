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
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false ) {
            header('Location: '."index.php");
    }
	?>
<div class="background">
    <div class="main-panel">
        <div class="block-design"></div>

        <img class="logo" src="./img/logo.png">

        <nav>
            <a href="index.php">HOME</a>
            <a href="purchase.php">SHOP</a>
            <a href="about_us.php">ABOUT US</a>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ): ?>
		        <a href="sign_out.php">SIGN OUT</a>
			<?php else: ?>
				<a href="sign_in.php">SIGN IN</a>
			<?php endif; ?>
	           

        </nav>

    <?php
        $name = $_SESSION['username'];
        $credits = $_SESSION['credit'];
    	print '<center><h1>Welcome aboard, '.$name.'!</h1>
        <h2>You currently have '.$credits.' credits.</h2>
        <button style="height:100px;width:200px">
                <center><a href="purchase.php">PURCHASE MORE CREDIT</a></center>
        </button>
        </center>
        <br>
        ';
    ?>

</div>
</div>
</body>