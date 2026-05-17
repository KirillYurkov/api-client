<?
header('Content-Type:application/json;charset=utf-8');
if (isset($_GET['num1'], $_GET['num2'])) {
    $response = [
        'num1' => $_GET['num1'],
        'num2' => $_GET['num2'],
        'status' => 'success'
    ];
    json_encode([$_GET['num1'], $_GET['num2']]);
} else {
    http_response_code(400);
    $error = [
        'error' => 'Missing required parameters: num1 and num2',
        'status' => 'error'
    ];
}
