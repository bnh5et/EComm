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
            header('Location: '."sign_in.html");
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

                <h3>50 Credits </h3>
                <div>
                    <h4> Pricing Details </h4>
                    <form action="startPayment.php" method="POST">
                        <input type="text" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
                        <table>
                            <tr><td>Total Amount </td><td><input class="form-control" type="text" name="camera_amount" value="500" readonly></input></td></tr>
                        </table>

                        <br/>

                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="HZL8V6JSWSZQE">
                            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </form>
                </div>

                <div class="button-box">
                    <a href="credit.php">GO BACK</a>
                </div>

            </div>
        </div>
    </body>
    </html>
<?php
?>