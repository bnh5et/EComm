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
            
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="sign_out.php">SIGN OUT</a>
            <?php else: ?>
                <a href="sign_in.php">SIGN IN</a>
            <?php endif; ?>
        </nav>
        <div class="signup-page" style="padding: 20px;">
            <div class="signup" style="width: 50%; display: inline-block; border-right: 2px solid slategray;">
                <h3 style="text-align: center;">SIGN IN</h3>
                <form action="signIn.php" method="post">
                    <p>Username:</p><input type="text" name="checkUsername" size="50">
                    <p></p>
                    <p>Password:</p><input type="password" name="checkPassword" size="50">
                    <p></p>
                    <input type="Submit" value="Submit">
                </form>
            </div>
            <div class="signin" style="width: 50%; display: inline-block; float: right; padding-left: 20px;">
                <h3 style="text-align: center;">Don't have an account?</h3>
                <div class="button-box">
                    <a href="sign_up.php">SIGN UP</a>
                </div>
            </div>

        </div>

        <div class="block-design"></div>
    </div>
</div>
</body>

