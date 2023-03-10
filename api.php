<?php
(error_reporting(-1));

$url = 'https://pay.xezine.az/api/v1/session';

$order_number = 'order-1234';
$order_amount = number_format($_POST['payment'],2,'.','');;
$order_currency = 'AZN';
$order_description = 'Important gift';
$first_name = $_POST['first_name'] ?: 'Anonim';
$last_name = $_POST['last_name'] ?: 'Anonim';
$customer_name = $first_name.' '.$last_name;
//$full_name = $_POST['first_name'].' '.$_POST["last_name"];
//$customer_name = 'Anonim';
//if (strlen($full_name)>2){
//    global $customer_name;
//    $customer_name = $full_name;
//    };
$customer_email = $_POST['mail'] ?: 'azuf@gmail.com';
//$customer_email = $_POST['mail'];
$cancel_url = 'http://127.0.0.1/azuf/cancel.php';
$success_url = 'http://127.0.0.1/azuf/success.php';
$billing_country = 'US';
$billing_state = 'CA';
$billing_city = 'Los Angeles';
$billing_address = 'Moor Building 35274';
$billing_zip = $_POST['fin'] ?: 'Anonim' ;
$billing_phone = $_POST['phone'];
$recurring_init = true;

echo 'last: '.$last_name.'<br>';
echo 'first: '.$first_name.'<br>';
echo 'mail: '.$customer_email.'<br>';
echo 'name:'.$customer_name.'<br>';
echo 'fin:' .$billing_zip.'<br>';
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
    "merchant_key" => $merchant_key,
    "operation" => 'purchase',
    'methods' => array(),
    'order' => array(
        'number' => $order_number,
        'amount' => $order_amount,
        'currency' => $order_currency,
        'description' => $order_description
    ),
    'cancel_url' => $cancel_url,
    'success_url' => $success_url,
   // 'customer' => array('email' => $customer_email),
   'customer' => array('name' => $customer_name, 'email' => $customer_email),
    "billing_address" => array(
        "country" => $billing_country,
        "state" => $billing_state,
        "city" => $billing_city,
        "address" => $billing_address,
        "zip" => $billing_zip,
        "phone" => $billing_phone
    ),
    'hash' => '$session_hash'
//    'hash' => $session_hash
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



