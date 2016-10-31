<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    //Merchant ID
    define("MERCHANT_ID","E9GCL5FX4TU2C");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AV1tOHhU7Bg2dqaG_s5lQnQ22h46RpLGcpJisi8RcLy4TfMslEHSQGXsMf-8w5x_E1FbsIj_w8bDl5NX");
    define("SANDBOX_CLIENT_SECRET", "EAT3KQyounCul-DWUW6S8sPR0851iZfgcWj2Hw3RJ9Y-ijMbA2ldMG__ujWBXQiXSU3cxpfBTT36kUlk");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "AV1tOHhU7Bg2dqaG_s5lQnQ22h46RpLGcpJisi8RcLy4TfMslEHSQGXsMf-8w5x_E1FbsIj_w8bDl5NX");
    define("LIVE_CLIENT_SECRET" , "EAT3KQyounCul-DWUW6S8sPR0851iZfgcWj2Hw3RJ9Y-ijMbA2ldMG__ujWBXQiXSU3cxpfBTT36kUlk");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>