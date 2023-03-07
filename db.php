<?php
$host = 'localhost';
$dbname = 'azuf_payments';
$username = 'root';
$password = '';

//$conn = mysqli_connect($host, $username, $password, $dbname);
//
//if (!$conn) {
//    die("Подключение не удалось: " . mysqli_connect_error());
//}else{
//    echo 'hello!';
//}



//form data record

$f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$fin = $_POST['fin'];
$payment = $_POST['payment'];

//connection to DB with PDO

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try{
    $pdo = new PDO( $dsn, $username, $password );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'hello';
}catch (PDOException $e){
    echo 'Somthing going wrong' . $e->getMessage();
}


//make sql request

$sql = "INSERT INTO payments ( first_name, last_name, mail, phone, fin, payment) VALUES (:f_name, :l_name, :mail, :phone, :fin, :payment)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'f_name' => $f_name,
    'l_name' => $l_name,
    'mail' => $mail,
    'phone' => $phone,
    'fin' => $fin,
    'payment' => $payment
]);


if($stmt->rowCount() > 0){
    echo 'GOOD';
} else {
    echo 'BAD';
}








