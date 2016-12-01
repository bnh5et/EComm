<?php
    /*
        * Payment Confirmation page : has call to execute the payment and displays the Confirmation details
    */
    $servername = "localhost";
    $user_name = "root";
    $password = "";
    //$conn = new mysqli($servername, $user_name, $password);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (session_id() == "")
        session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: '."sign_in.php");
    }
    include('utilFunctions.php');
    include('paypalFunctions.php');


    if( isset($_GET['paymentId']) && isset($_GET['PayerID'])){ //Proceed to Checkout or Mark flow

        //call to execute payment
        $response = doPayment(filter_input( INPUT_GET, 'paymentId', FILTER_SANITIZE_STRING ), filter_input( INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING ), NULL);

    } else { //Express checkout flow

        if(verify_nonce()){
            $expressCheckoutFlowArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
                    $transactionAmountUpdateArray = $expressCheckoutFlowArray['transactions'][0];
                    $_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutFlowArray);

                    //call to execute payment with updated shipping and overall amount details
                    $response = doPayment($_SESSION['paymentID'], $_SESSION['payerID'], $transactionAmountUpdateArray);
        } else {
            die('Session expired');
        }
    }
	
	// REST validation; route non-HTTP 200 to error page
	if ($response['http_code'] != 200 && $response['http_code'] != 201) {		
		$_SESSION['error'] = $response;
		header( 'Location: error.php');
		
		// need exit() here to maintain session data after redirect to error page
		exit();
	}
	
	$json_response = $response['json']; 
	
    $paymentID= $json_response['id'];
    $paymentState = $json_response['state'];
    $finalAmount = $json_response['transactions'][0]['amount']['total'];
    $currency = $json_response['transactions'][0]['amount']['currency'];
    $transactionID= $json_response['transactions'][0]['related_resources'][0]['sale']['id'];

    $payerFirstName = filter_var($json_response['payer']['payer_info']['first_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $payerLastName = filter_var($json_response['payer']['payer_info']['last_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipientName= filter_var($json_response['payer']['payer_info']['shipping_address']['recipient_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine1= filter_var($json_response['payer']['payer_info']['shipping_address']['line1'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine2 = (isset($json_response['payer']['payer_info']['shipping_address']['line2']) ? filter_var($json_response['payer']['payer_info']['shipping_address']['line2'],FILTER_SANITIZE_SPECIAL_CHARS) :  "" );
    $city= filter_var($json_response['payer']['payer_info']['shipping_address']['city'],FILTER_SANITIZE_SPECIAL_CHARS);
    $state= filter_var($json_response['payer']['payer_info']['shipping_address']['state'],FILTER_SANITIZE_SPECIAL_CHARS);
    $postalCode = filter_var($json_response['payer']['payer_info']['shipping_address']['postal_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    $countryCode= filter_var($json_response['payer']['payer_info']['shipping_address']['country_code'],FILTER_SANITIZE_SPECIAL_CHARS);
	
?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4>
                <?php echo($payerFirstName.' '.$payerLastName.', Thank you for your Order!');?><br/><br/>
                <h4>Payment ID: <?php echo($paymentID);?> <br/>
		Transaction ID : <?php echo($transactionID);?> <br/>
                State : <?php echo($paymentState);?> <br/>
                Total Amount: <?php echo($finalAmount);?> &nbsp;  <?php echo($currency);?> <br/>
            </h4>
            <br/>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php

$con = mysqli_connect($servername, $user_name, $password, "ecomm");


$currentnumberofcredits = (int)$_SESSION['credit'] + (int)$finalAmount / 10;
//echo $currentnumberofcredits;
$user = $_SESSION['username'];
//echo $user;
$sql = "UPDATE user
        SET credits = '$currentnumberofcredits'
        WHERE username = '$user';";
if ($con->query($sql) === TRUE) {
    echo $currentnumberofcredits." credits are in your account.";
    $_SESSION['credit'] = $currentnumberofcredits;
}
else {
    echo $con->error;
}
if (session_id() !== "") {
    //session_unset();
    //session_destroy();
    unset($_SESSION['paymentId']);
    unset($_SESSION['PayerID']);
}
?>

<html>
<form action="home.php">
    <input type="submit" value="Back" />
</form>
</html>

