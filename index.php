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
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ) {
            header('Location: '."home.php");
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
        <div class="home-page">
            <div id="textbook-overlay">
                <img src="./img/textbooks.jpg">
            </div>
            <div class="block-design" style="height: 15px;"></div>
            <div class="page-details">
                <div id="left-panel">
                    <img src="./img/large.jpg" style="border: 4px solid white; outline: 4px solid gold;">
                </div>
                <div id="right-panel">
                    <h4 style="font-weight: bold">The secret overpriced bookstores don't want you to know...</h4>
                    <p>Never lug around heavy textbooks around campus again! With TextTrade, find affordable eTextbooks for all your courses, then trade them next semester for a new set of books at a low cost! </p>
                </div>
            </div>
        </div>
        <div class="block-design"></div>
    </div>
</div>
</body>
</html>




