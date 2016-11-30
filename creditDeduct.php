<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false ) {
    header('Location: '."index.php");
}

$available_credits = $_SESSION['credit'];

if($available_credits >= $_POST['credits']) {
    echo "Congrats! Your order has been placed"."<br>";
    $_SESSION['credit'] = $_SESSION['credit'] - $_POST['credits'];
}
else {
    echo "You need more credits to purchase this item. Please go back and pruchase more credits."."<br>";
}


?>
<html>
<form action="credit.php">
    <input type="submit" value="Back" />
</form>
</html>
