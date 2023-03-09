<?php

// Получаем данные, отправленные Xezine
$request_body = file_get_contents('php://input');

// Декодируем JSON-данные в массив
$data = json_decode($request_body, true);

// Проверяем, что это уведомление о транзакции
if ($data['type'] == 'transaction') {
    // Получаем ID транзакции
    $transaction_id = $data['data']['id'];

    // Выполняем запрос к API Xezine, чтобы получить подробную информацию о транзакции
    $url = "https://pay.xezine.az/api/v1/transaction/$transaction_id";
    $headers = array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer {ваш_токен}'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $transaction_data = json_decode($response, true);

    // Обрабатываем данные транзакции
    $status = $transaction_data['status'];
    $amount = $transaction_data['amount'];
    $currency = $transaction_data['currency'];
    // и т.д.

    // Сохраняем данные транзакции в базе данных или отправляем уведомление на электронную почту
    // ...
}