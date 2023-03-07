<?php
// Set the API endpoint URL
$url = 'https://pay.xezine.az/api/v1/session/status';

$merchant_key = 'c0892a60-af39-11eb-affd-fac77cf0e095';
// Set the request headers
$headers = array(
    'Content-Type: application/json',
    'Accept: application/json',
);

// Set the payment session hash
$session_hash = $_POST['session_id'];

// Set the payment data
$data = array(
    "merchant_key" => $merchant_key,
    "hash" => $session_hash,
);

// Encode the payment data as JSON
$data = json_encode($data);

// Create a new cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the cURL request and get the response
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$json_response = json_decode($response, true);


var_dump($json_response);