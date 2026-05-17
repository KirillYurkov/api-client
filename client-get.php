<?php
$url = 'http://api/index.php?num1=1&num2=10';

$curlHandle = curl_init();
curl_setopt_array($curlHandle, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPGET => true,
    CURLOPT_TIMEOUT => 30
]);

$response = curl_exec($curlHandle);
$httpCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
$error = curl_error($curlHandle);
curl_close($curlHandle);

if ($error) {
    echo 'Ошибка CURL: ' . $error;
    exit;
}

if ($httpCode !== 200) {
    echo 'HTTP ошибка: ' . $httpCode;
    exit;
}

if (empty($response)) {
    echo 'Пустой ответ от сервера';
    exit;
}

$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Ошибка декодирования JSON: ' . json_last_error_msg();
    exit;
}

echo '<pre>';
print_r($data);
echo '</pre>';
