<?php
(error_reporting(-1));

$url = {{url}}
$merchant_key = {{MID}}
$merchant_pass = {{PASS}}
$order_number = 'order-1234';
$order_amount = number_format($_POST['payment'],2,'.','');;
$order_currency = 'AZN';
$order_description = 'Important gift';
$customer_name = $_POST['first_name'].' '.$_POST["last_name"];
$customer_email = $_POST['mail'];
$cancel_url = 'https://example.com/cancel';
$success_url = 'https://example.com/success';
$billing_country = 'US';
$billing_state = 'CA';
$billing_city = 'Los Angeles';
$billing_address = 'Moor Building 35274';
$billing_zip = '123456';
$billing_phone = $_POST['phone'];
$recurring_init = true;

$headers = array(
    'Content-Type: application/json',
    'Accept: application/json',
);

$to_md5 = strtoupper($order_number.$order_amount.$order_currency.$order_description.$merchant_pass);
$md5_hash = md5($to_md5);
$sha1_hash = sha1($md5_hash);
$session_hash = $sha1_hash;
var_dump($session_hash);

$payment_data = array(
    "merchant_key" => 'c0892a60-af39-11eb-affd-fac77cf0e095',
    "operation" => 'purchase',
    'methods' => array('card'),
    'order' => array(
        'number' => $order_number,
        'amount' => $order_amount,
        'currency' => $order_currency,
        'description' => $order_description
    ),
    'cancel_url' => $cancel_url,
    'success_url' => $success_url,
    'customer' => array('name' => $customer_name, 'email' => $customer_email),
    "billing_address" => array(
        "country" => $billing_country,
        "state" => $billing_state,
        "city" => $billing_city,
        "address" => $billing_address,
        "zip" => $billing_zip,
        "phone" => $billing_phone
    ),
    'hash' => $session_hash
);

//'3627db9225be17641a62f15b0b425e6434dbbae4'
$data = json_encode($payment_data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$json_response = json_decode($response, true);
if (isset($json_response['redirect_url'])) {
    header('Location: ' . $json_response['redirect_url']);
    exit;
} else {
    var_dump($json_response);
    echo 'Error: redirect URL not found in response';
}
?>