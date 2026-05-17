<?php
header('Content-Type: application/json; charset=UTF-8');
$response = [
    'status' => 'success',
    'data' => $_POST,
];
echo json_encode($response, JSON_UNESCAPED_UNICODE);