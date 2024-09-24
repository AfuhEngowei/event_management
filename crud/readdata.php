<?php
// header('Access-Control-Allow-Origin:*');
// header('Content-Type: aplication/json');
// header('Access-Control-Allow-Method: GET');
// header('Access-Control-Allow-Headers: Content-Type, Access-control-Allow-Headers, Authorization, X-Request-With');

include("process.php");
$requestmethod= $_SERVER["REQUEST_METHOD"];
if ( $requestmethod == "GET")
{
$events = getevents($_GET);
echo $events;
}
else {
    $data= [
        'status' => 405,
        'message' => $requestmethod. '  method not allowed'
    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}
?>