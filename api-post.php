<?php
$url2 = 'https://api/index.php';

$postData = [
    'num1' => 1,
    'num2' => 10
];

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_URL => $url2,
    CURLOPT_POSTFIELDS => http_build_query($postData),
    CURLOPT_TIMEOUT => 30
]);

$response = curl_exec($ch);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    echo 'Ошибка CURL: ' . $curlError;
    exit;
}
$data = json_decode($response, true);
echo '<pre>';
print_r($data);
echo '</pre>';