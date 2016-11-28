<?php

$servername = "localhost";
$user_name = "root";
$password = "";

$conn = mysqli_connect($servername,$user_name,$password,"ecomm");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



?>