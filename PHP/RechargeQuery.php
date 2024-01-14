<?php
// Function to generate the access token

function generateAccessToken($consumerKey, $consumerSecret)
{
    // OAuth API endpoint
    $oauthURL = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

    // Create the Basic Auth string
    $credentials = base64_encode($consumerKey . ":" . $consumerSecret);

    // Prepare the HTTP headers
    $headers = array(
        "Authorization: Basic $credentials"
    );

    // Initiate the cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $oauthURL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Set to true for production environment

    // Execute the cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $response = json_encode(array("error" => "Curl error: " . curl_error($ch)));
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response and extract the access token
    $data = json_decode($response, true);
    return $data['access_token'];
}

// Function to generate Lipa Na M-Pesa online payment URL
function generateLipaNaMpesaURL($phone, $amount)
{
    $consumerKey = "m73qhD8dlDWCjmdep89uqpPwvANNYSd5";
    $consumerSecret = "aCYAzlkNTJghgYYx";
    $shortcode = "174379";
    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $callbackURL = "http://localhost/DEVELOPMENT%20PROJECTS/MONEYSQAR%20TECHNOLOGIES/HTML%20FILES/index.php";

    // Lipa Na M-Pesa online payment API endpoint
    $lipaNaMpesaURL = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

    // Generate a random transaction reference number
    $transactionRef = "REF" . rand(100000, 999999);

    // Create the access token
    $accessToken = generateAccessToken($consumerKey, $consumerSecret);

    // Prepare the request data
    $postData = array(
        "BusinessShortCode" => $shortcode,
        "Password" => base64_encode($shortcode . $passkey . date("YmdHis")),
        "Timestamp" => date("YmdHis"),
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phone,
        "PartyB" => $shortcode,
        "PhoneNumber" => $phone,
        "CallBackURL" => $callbackURL,
        "AccountReference" => $transactionRef,
        "TransactionDesc" => "Deposit Funds"
    );

    // Prepare the HTTP headers
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer $accessToken"
    );

    // Initiate the cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $lipaNaMpesaURL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Set to true for production environment

    // Execute the cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $response = json_encode(array("CustomerMessage" => "Curl error: " . curl_error($ch)));
    }

    // Close the cURL session
    curl_close($ch);

    // Check if the response is valid JSON
    $responseData = json_decode($response, true);
    if ($responseData === null) {
        // Log the raw response for debugging purposes
        file_put_contents('lipa_na_mpesa_error.log', $response . PHP_EOL, FILE_APPEND);
        return array("CustomerMessage" => "An error occurred. Please try again later.");
    }

    // Return the response as an array
    return $responseData;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the phone number and amount from the form
    $phone = $_POST['phoneno'];
    $amount = $_POST['amount'];

    // Call the function to generate the Lipa Na M-Pesa URL
    $result = generateLipaNaMpesaURL($phone, $amount);

    // Redirect user to the generated URL (if successful)
    if (isset($result['CustomerMessage'])) {
        header("Location: " . $result['CustomerMessage']);
        exit();
    } else {
        // Handle the error here (e.g., display an error message)
        echo "An error occurred. Please try again later.";
    }
}
