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
                <a href="home.html">HOME</a>
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
                            <tr><td>Insurance </td><td><input class="form-control" type="text" name="insurance" value="10" readonly></input> </td></tr>
                            <tr><td>Handling Fee </td><td><input class="form-control" type="text" name="handling_fee" value="5" readonly></input> </td></tr>
                            <tr><td>Estimated Shipping </td><td><input class="form-control" type="text" name="estimated_shipping" value="2" readonly></input> </td></tr>
                            <tr><td>Shipping Discount </td><td><input class="form-control" type="text" name="shipping_discount" value="-2" readonly></input> </td></tr>
                            <tr><td>Total Amount </td><td><input class="form-control" type="text" name="total_amount" value="320" readonly></input> </td></tr>
                        </table>

                        <br/>
                        <!--Container for Checkout with PayPal button-->
                        <div id="myContainer"></div>
                        <br/>
                        <span style="margin-left:60px">OR</span>
                        <br/><br/>
                        <div>
                            <button class="btn btn-primary" formaction="shipping.php" role="button">Proceed to Checkout</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- PayPal In-Context Checkout script -->
            <script type="text/javascript">
                window.paypalCheckoutReady = function () {
                    paypal.checkout.setup('<?php echo(MERCHANT_ID); ?>', {
                        container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
                        environment: '<?php echo($environment); ?>' //or 'production' depending on your environment
                    });
                };
            </script>
            <script src="//www.paypalobjects.com/api/checkout.js" async></script>
        </div>
    </body>
    </html>
<?php
?>