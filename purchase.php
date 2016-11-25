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
    <div class="background">
        <div class="main-panel">
            <div class="block-design"></div>
            <img class="logo" src="./img/logo.png">
            <nav>
                <a href="index.php">HOME</a>
                <a href="purchase.html">SHOP</a>
                <a href="about_us.html">ABOUT US</a>
                <a href="sign_up.html">SIGN UP</a>
            </nav>


            <div class="aboutus-page">
                <div>
                    <img src="img/artificialintelligence.jpg" />
                </div>
                <h3>Artificial Intelligence, A Modern Approach </h3>
                <br/><br/>

                <div>
                    <h3> Pricing Details </h3>
                    <form action="startPayment.php" method="POST">
                        <input type="text" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
                        <table>
                            <tr><td>Textbook </td><td><input class="form-control" type="text" name="camera_amount" value="300" readonly></input></td></tr>
                            <tr><td>Tax </td><td><input class="form-control" type="text" name="tax" value="5" readonly></input> </td></tr>
                            <tr><td>Total Amount </td><td><input class="form-control" type="text" name="total_amount" value="305" readonly></input> </td></tr>
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
            </div>
        </div>
    </body>
    </html>
<?php
?>