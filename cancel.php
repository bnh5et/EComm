<?php
    /*
        * Cancel Order page
    */

    if (session_id() == "")
        session_start();

?>
    <link rel="stylesheet" href="styles.css">
    <div class="background">
        <div class="main-panel">
            <div class="block-design"></div>
            <img class="logo" src="./img/logo.png">
            <nav>
                <a href="index.php">HOME</a>
                <a href="purchase.php">SHOP</a>
                <a href="about_us.php">ABOUT US</a>
                <a href="sign_up.php">SIGN UP</a>
            </nav>
            <div class="aboutus-page">
                <h4>
                    You cancelled the order.
                </h4>
            </div>
            <div class="block-design"></div>
        </div>
    </div>
<?php
?>