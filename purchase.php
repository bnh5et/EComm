<?php
/*
    * Home Page - has Sample Buyer credentials, Camera (Product) Details and Instructiosn for using the code sample
*/
include('apiCallsData.php');
include('paypalConfig.php');

//setting the environment for Checkout script
if(SANDBOX_FLAG) {
    $environment = SANDBOX_ENV;
} else {
    $environment = LIVE_ENV;
}
?>
    <html>
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
    //session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            
            //echo "Welcome, " . $_SESSION['username'] . "!";
        } 
        else {
            //header('Location: '."index.html");
            //echo "HELLO.";
            header('Location: '."sign_in.php");
            echo "You are not signed in";
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


            <div class="aboutus-page">
                <div>
                    <img src="img/artificialintelligence.jpg" />
                </div>
                <h3>Artificial Intelligence, A Modern Approach </h3>
                <br/><br/>

                <div>
                    <h3> Pricing Details </h3>
                    <form action="creditDeduct.php" method="POST">
                        Total Credits: <input name="credits" type="text" value="35" readonly>
                        <p></p>
                        <input type="submit" value="Purchase">
                    </form>
                    <div class="button-box" style="width: 240px; margin-left: calc(50% - 120px);">
                        <a href="credit.php">BUY MORE CREDITS</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
?>