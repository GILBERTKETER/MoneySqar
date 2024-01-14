<?php
// Replace these values with your own credentials from Safaricom developer portal
$consumerKey = 'YOUR_CONSUMER_KEY';
$consumerSecret = 'YOUR_CONSUMER_SECRET';
$shortcode = 'YOUR_SHORTCODE';
$passkey = 'YOUR_LIPA_NA_MPESA_PASSKEY';
$callbackUrl = 'YOUR_CALLBACK_URL'; // URL to receive transaction responses

// The base URL for Safaricom's API
$baseURL = 'https://sandbox.safaricom.co.ke';

// Generate the access token required for API requests
function generateAccessToken($consumerKey, $consumerSecret)
{
    $credentials = base64_encode($consumerKey . ':' . $consumerSecret);
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $headers = array('Authorization: Basic ' . $credentials);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Initiate STK Push (Lipa Na M-Pesa Online) request
function stkPush($accessToken, $shortcode, $passkey, $phone, $amount, $callbackUrl)
{
    $baseURL = 'https://sandbox.safaricom.co.ke';

    $url = $baseURL . '/mpesa/stkpush/v1/processrequest';

    $timestamp = date('YmdHis');
    $password = base64_encode($shortcode . $passkey . $timestamp);

    $headers = array(
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    );

    $data = array(
        'BusinessShortCode' => $shortcode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phone, // Phone number sending the money
        'PartyB' => $shortcode,
        'PhoneNumber' => $phone, // Phone number sending the money
        'CallBackURL' => $callbackUrl,
        'AccountReference' => 'YourReference', // Replace with your own reference
        'TransactionDesc' => 'YourTransactionDescription' // Replace with your own description
    );

    $payload = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Usage example:
$accessTokenData = generateAccessToken($consumerKey, $consumerSecret);
$accessToken = $accessTokenData['access_token'];

$phone = '2547XXXXXXXX'; // Replace with the phone number you want to send money to
$amount = 100; // Replace with the amount you want to send

$response = stkPush($accessToken, $shortcode, $passkey, $phone, $amount, $callbackUrl);

// Handle the response (check $response for transaction details)
var_dump($response);
