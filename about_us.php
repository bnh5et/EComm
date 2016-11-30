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
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ): ?>
                <a href="sign_out.php">SIGN OUT</a>
            <?php else: ?>
                <a href="sign_in.php">SIGN IN</a>
            <?php endif; ?>
        </nav>
        <div class="aboutus-page">
            <div>
                <div class="info-box">
                    <h4>What we do...</h4>
                    <p>This company was founded by three college students who were sick of carrying around heavy textbooks
                        and paying incredibly high prices for eTextbooks. Then we created TextTrade to solve our problems.
                        TextTrade provides a platform for re-selling used eTextbooks online.</p>
                </div>
                <div class="info-box" style="float:right; top: 50%; transform: translate(0, -75%);">
                    <h4>Our values...</h4>
                    <p>We believe that textbook publishers profit too much off of college students. After tuition, the last
                        thing students need is more costs. We created our site so students can learn without having to go even
                        more into debt.</p>
                </div>
                <div class="info-box">
                    <h4>Why choose us...</h4>
                    <p>We offer a unique service that can cut the cost of eTextbooks. Many publishers charge very high prices
                        for eTextbooks, which can be reproduced for almost nothing. This site provides a way to share eTextbooks
                        without paying hundreds of dollars.</p>
                </div>
            </div>
            <div class="block-design" style="height: 2px;"></div>
            <h2 style="text-align: center;">Our Team</h2>
            <div class="person-info-box">
                <img src="img/bri.jpg">
                <p>Briana Hart</p>
            </div>
            <div class="person-info-box">
                <img src="img/amber.jpg">
                <p>Amber Lee</p>
            </div>
            <div class="person-info-box">
                <img src="img/tiffany.jpg">
                <p>Tiffany Vinci-Cannava</p>
            </div>
        </div>
        <div class="block-design"></div>
    </div>
</div>
</body>
</html>
